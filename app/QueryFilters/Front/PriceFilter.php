<?php

namespace App\QueryFilters\Front;

use Closure;

class PriceFilter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        $builder->whereHas('structures', function ($query) {
            if (!empty(request('structure_id'))) {
                $query->where('houses_structures.structure_id', '=', request('structure_id'));
            }

            if (!empty(request('price_min'))) {
                $query->where('houses_structures.price', '>=', request('price_min'));
            }

            if (!empty(request('price_max'))) {
                $query->where('houses_structures.price', '<=', request('price_max'));
            }
        });

        return $builder;
    }
}
