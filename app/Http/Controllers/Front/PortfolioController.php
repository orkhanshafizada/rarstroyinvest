<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\House\Filter\Filter;
use App\Models\House\House\House;
use App\QueryFilters\Front\FilterFilter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\View\View;

class PortfolioController extends Controller
{

    public function index($current = 1)
    {
        $filters    = Filter::with([
            'houses' => function($query)
            {
                $query->select('houses.*', 'houses_filters.value')->where('houses.type', 'portfolio')->distinct('houses_filters.value');
            }
        ])->active()->orderBy('sort')->get();

        $paginate = 12;
        $prevPage = $current > 1 ? $current - 1 : '';
        $nextPage = '';

        $query  = House::portfolio()->active()->with(['filters'])->orderBy('created_at', 'DESC');
        $houses = app(Pipeline::class)->send($query)->through([
            FilterFilter::class,
        ])->thenReturn()->paginate($paginate, ['*'], 'page', $current)->withQueryString();

        if($houses->hasPages())
        {
            $nextPage = $houses->hasMorePages() ? $current + 1 : '';
        }

        $allPage     = $houses->lastPage();
        $totalHouses = $houses->total();

        return view('front.portfolio.index', [
            'houses'      => $houses,
            'filters'     => $filters,
            'prevPage'    => $prevPage,
            'nextPage'    => $nextPage,
            'current'     => $current,
            'allPage'     => $allPage,
            'totalHouses' => $totalHouses,
        ]);
    }

    public function filter(Request $request)
    {
        $paginate    = 12;
        $currentPage = $request->input('page', 1);

        $query = House::portfolio()->active()->with(['filters'])->orderBy('created_at', 'DESC');
        $houses = app(Pipeline::class)->send($query)->through([
            FilterFilter::class,
        ])->thenReturn()->paginate($paginate, ['*'], 'page', $currentPage)->withQueryString();

        $housesView     = view('front.portfolio.partials.houses', compact('houses'))->render();
        $paginationView = view('front.portfolio.partials.pagination', compact('houses'))->render();
        $totalHouses    = $houses->total();

        return response()->json([
            'houses'      => $housesView,
            'pagination'  => $paginationView,
            'totalHouses' => $totalHouses,
        ]);
    }

    public function show(string $slug): View
    {
        $house = House::portfolio()->whereHas('translations', function($query) use ($slug)
        {
            $query->where('slug', $slug)->where('locale', 'ru');
        })->with([
            'filters'    => function($query)
            {
                $query->orderBy('sort', 'asc');
            }
        ])->firstOrFail();

        $similarHouses = House::portfolio()->where('id', '!=', $house->id)->orderBy('created_at', 'desc')->paginate(12);

        $currentUrl = url()->current();

        return view('front.portfolio.detail', [
            'house'      => $house,
            'currentUrl' => $currentUrl,
            'houses'     => $similarHouses,
        ]);
    }


}
