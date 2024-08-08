<?php

namespace App\QueryFilters\Front\Projects;

class AreaFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);
        $areae = request('areae');
        if ($areae && $areae != 'All') {
            $builder->where('area_id', $areae);
        }
        return $builder;
    }
}
