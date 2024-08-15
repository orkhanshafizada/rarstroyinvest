<?php

namespace App\QueryFilters\Front;

use Closure;

class StructureFilter
{
    public function handle($request, Closure $next)
    {
        if (!request()->has('structure_id') || empty(request('structure_id'))) {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->whereHas('structures', function($query) {
            $query->where('structure_id', request('structure_id'));
        });
    }
}

