<?php

namespace App\QueryFilters\Front\Projects;

class RegionFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);
        $regione = request('regione');
        if ($regione && $regione != 'All') {
            $builder->where('region_id', $regione);
        }
        return $builder;
    }
}
