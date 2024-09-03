<?php

namespace App\QueryFilters\Front;

use Closure;

class PriceSortFilter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if ($sortType = request('sortType')) {
            $builder->orderBy('houses_structures.price', $sortType === 'sort-desc' ? 'desc' : 'asc');
        }

        return $builder;
    }
}
