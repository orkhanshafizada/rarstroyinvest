<?php

namespace App\QueryFilters\Front\Projects;

class StatusFilter
{
    public function handle($request, $next)
    {

        $builder = $next($request);
        $statuse = request('statuse');

        if ($statuse && $statuse != 'All') {
            $builder->where('status', $statuse);
        }

        return $builder;
    }
}
