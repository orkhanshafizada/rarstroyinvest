<?php

namespace App\Http\Controllers\Front\Social;

use App\Http\Controllers\Controller;
use App\Models\Area\Area;
use App\QueryFilters\Front\Projects\AreaFilter;
use App\QueryFilters\Front\Projects\RegionFilter;
use App\QueryFilters\Front\Projects\StatusFilter;
use Illuminate\Pipeline\Pipeline;
use App\Models\Banner;
use App\Models\Project\Project;
use App\Models\Region\Region;
use App\Models\Social\Social;

use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index($areae = 'All', $regione = 'All', $statuse = 'All', $current = 1): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $allPage = 0;

        $socials = Social::with('detail')->where('type','=', 2)->where('grid_type','=',1)->get();
        $areas = Area::all();
        $regions = Region::all();

        $paginate =6;
        $skip = ($current*$paginate)-$paginate;
        $prevPage = $nextPage = '';
        if($skip>0){
            $prevPage = $current - 1;
        }

        $query = Project::with('detail')->orderBy('created_at', 'DESC');
        $projects = app(Pipeline::class)
            ->send($query)
            ->through([
                AreaFilter::class,
                RegionFilter::class,
                StatusFilter::class,
            ])
            ->thenReturn()
            ->paginate($paginate, ['*'], 'page', $current)
            ->withQueryString();
        if($projects->count()>0){
            if($projects->count()>=$paginate){
                $nextPage = $current + 1;
                if($nextPage > $projects->lastPage()){
                    $nextPage = '';
                }
            }
        }

        $allPage = ceil($projects->count() / $paginate);


        return view('front.social.project.index',
            compact('banner', 'projects','socials','areas','regions',
                'prevPage', 'nextPage','current','allPage',
                'areae','statuse','regione'));
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $project = Project::with('detail')
            ->whereHas('detail.translations', function ($query) use ($slug) {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();
        Project::where('id', $project->id)->update([
            'show' => $project->show + 1
        ]);
        $projects = Project::where('id', '!=', $project->id)->orderBy('created_at','DESC')->paginate(3);

        return view('front.social.project.detail', compact('project','projects'));
    }
}
