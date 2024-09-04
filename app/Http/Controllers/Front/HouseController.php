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
use App\QueryFilters\Front\PriceSortFilter;
use App\QueryFilters\Front\StructureFilter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\View\View;

class HouseController extends Controller
{
    private const PAGINATE = 12;

    public function index(int $current = 1): View
    {
        \DB::listen(function ($query) {
            \Log::info($query->sql);
            \Log::info($query->bindings);
        });

        return view('front.house.index', array_merge($this->getCommonData($current), $this->getPriceRange()));
    }

    public function filter(Request $request): \Illuminate\Http\JsonResponse
    {
        $housesData = $this->getHousesWithPagination($request->input('page', 1));

        return response()->json($housesData);
    }

    public function show(string $slug): View
    {
        $house = House::findBySlug($slug, 'ru');
        $similarHouses = $this->getSimilarHouses($house->id);
        $mortgages = Mortgage::active()->orderBy('sort', 'asc')->get();

        return view('front.house.detail', [
            'house'      => $house,
            'currentUrl' => url()->current(),
            'houses'     => $similarHouses,
            'mortgages'  => $mortgages,
        ]);
    }

    private function getHousesWithPagination(int $page): array
    {
        $houses = $this->filterHouses($page);

        return [
            'houses'      => view('front.house.partials.houses', compact('houses'))->render(),
            'pagination'  => view('front.house.partials.pagination', compact('houses'))->render(),
            'totalHouses' => $houses->total(),
        ];
    }

    private function filterHouses(int $currentPage)
    {
        return $this->applyFilters(House::catalogue()->active())->paginate(self::PAGINATE, ['*'], 'page', $currentPage)->withQueryString();
    }

    private function getCommonData(int $current): array
    {
        $houses = $this->filterHouses($current);
        $structures = Structure::active()->orderBy('sort')->get();
        $filters    = Filter::with([
            'houses' => function($query)
            {
                $query->select('houses.*', 'houses_filters.value')->where('houses.type', 'catalogue')->distinct('houses_filters.value');
            }
        ])->active()->orderBy('sort')->get();

        return [
            'houses'      => $houses,
            'structures'  => $structures,
            'filters'     => $filters,
            'prevPage'    => $current > 1 ? $current - 1 : '',
            'nextPage'    => $houses->hasMorePages() ? $current + 1 : '',
            'current'     => $current,
            'allPage'     => $houses->lastPage(),
            'totalHouses' => $houses->total(),
        ];
    }

    private function hasNextPage($currentPage)
    {
        $houses = $this->filterHouses($currentPage);
        return $houses->hasMorePages() ? $currentPage + 1 : '';
    }

    private function getAllPages($currentPage)
    {
        $houses = $this->filterHouses($currentPage);
        return $houses->lastPage();
    }

    private function getTotalHouses($currentPage)
    {
        $houses = $this->filterHouses($currentPage);
        return $houses->total();
    }

    private function getPriceRange(): array
    {
        return [
            'minPrice' => HouseStructure::min('price'),
            'maxPrice' => HouseStructure::max('price'),
        ];
    }

    private function getSimilarHouses(int $houseId)
    {
        return House::catalogue()->where('id', '!=', $houseId)->orderBy('created_at', 'desc')->paginate(self::PAGINATE);
    }

    private function applyFilters($query)
    {
        return app(Pipeline::class)->send($query->with([
            'structures',
            'filters'
        ])->orderBy('created_at', 'DESC'))->through($this->getFilterPipeline())->thenReturn();
    }

    private function getFilterPipeline()
    {
        return [
            StructureFilter::class,
            PriceFilter::class,
            FilterFilter::class,
            //PriceSortFilter::class,
        ];
    }
}
