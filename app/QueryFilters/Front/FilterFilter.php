<?php

namespace App\QueryFilters\Front;

use Closure;

class FilterFilter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);

        if (request()->has('filters')) {
            foreach (request('filters') as $filterId => $values) {
                $builder->whereHas('filters', function($query) use ($filterId, $values) {
                    $query->where('filter_id', $filterId)
                          ->whereIn('value', $values);
                });
            }
        }

        return $builder;
    }
}


