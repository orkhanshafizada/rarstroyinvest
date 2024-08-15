<?php

namespace App\QueryFilters\Front;

use Closure;

class PriceFilter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if (request()->has('price_min') && !empty(request('price_min'))) {
            $builder->whereHas('structures', function ($query) {
                $query->where('houses_structures.price', '>=', request('price_min'));
            });
        }

        if (request()->has('price_max') && !empty(request('price_max'))) {
            $builder->whereHas('structures', function ($query) {
                $query->where('houses_structures.price', '<=', request('price_max'));
            });
        }

        return $builder;
    }
}
