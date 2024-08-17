<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\House\Filter\Filter;
use App\Models\House\House\House;
use App\Models\House\House\HouseStructure;
use App\Models\House\Mortgage\Mortgage;
use App\Models\House\Structure\Structure;
use App\QueryFilters\Front\FilterFilter;
use App\QueryFilters\Front\PriceFilter;
use App\QueryFilters\Front\StructureFilter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\View\View;

class HouseController extends Controller
{

    public function index($current = 1)
    {
        $structures = Structure::active()->get()->sortByDesc('sort');
        $filters    = Filter::with([
            'houses' => function($query)
            {
                $query->select('houses.*', 'houses_filters.value')->distinct('houses_filters.value');
            }
        ])->active()->get()->sortByDesc('sort');

        $minPrice = HouseStructure::min('price');
        $maxPrice = HouseStructure::max('price');

        $paginate = 12;
        $prevPage = $current > 1 ? $current - 1 : '';
        $nextPage = '';

        $query  = House::active()->with(['structures', 'filters'])->orderBy('created_at', 'DESC');
        $houses = app(Pipeline::class)->send($query)->through([
                StructureFilter::class,
                PriceFilter::class,
                FilterFilter::class,
            ])->thenReturn()->paginate($paginate, ['*'], 'page', $current)->withQueryString();

        if($houses->hasPages())
        {
            $nextPage = $houses->hasMorePages() ? $current + 1 : '';
        }

        $allPage     = $houses->lastPage();
        $totalHouses = $houses->total();

        return view('front.house.index', [
            'houses'      => $houses,
            'structures'  => $structures,
            'filters'     => $filters,
            'prevPage'    => $prevPage,
            'nextPage'    => $nextPage,
            'current'     => $current,
            'allPage'     => $allPage,
            'totalHouses' => $totalHouses,
            'minPrice'    => $minPrice,
            'maxPrice'    => $maxPrice,
        ]);
    }

    public function filter(Request $request)
    {
        $paginate = 12;
        $currentPage = $request->input('page', 1);

        $query = House::active()->with(['structures', 'filters'])->orderBy('created_at', 'DESC');

        $houses = app(Pipeline::class)
            ->send($query)
            ->through([
                StructureFilter::class,
                PriceFilter::class,
                FilterFilter::class,
            ])
            ->thenReturn()
            ->paginate($paginate, ['*'], 'page', $currentPage)
            ->withQueryString();

        $housesView = view('front.house.partials.houses', compact('houses'))->render();
        $paginationView = view('front.house.partials.pagination', compact('houses'))->render();
        $totalHouses = $houses->total();

        return response()->json([
            'houses' => $housesView,
            'pagination' => $paginationView,
            'totalHouses' => $totalHouses,
        ]);
    }

    public function show(string $slug): View
    {
        $house = House::whereHas('translations', function($query) use ($slug)
        {
            $query->where('slug', $slug)->where('locale', 'ru');
        })->firstOrFail();

        $similar_houses = House::where('id', '!=', $house->id)->orderBy('created_at', 'DESC')->paginate(12);
        $currentUrl     = url()->current();
        $mortgages      = Mortgage::active()->get()->sortByDesc('sort');

        return view('front.house.detail', [
            'house'          => $house,
            'currentUrl'     => $currentUrl,
            'houseSliders' => $similar_houses,
            'mortgages'      => $mortgages,
        ]);
    }
}
