<?php

namespace App\Http\Controllers\Front\Media;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\File;
use App\Models\Media\Medias;
use App\Models\Report\Report;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * @return View
     */
    public function index($type = 'All', $current = 1): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $medias = Medias::with('detail')->where('type','!=', 2)->get()->sortByDesc('created_at');
        $allPage = 0;
        $paginate = 15;
        $skip = ($current*$paginate)-$paginate;
        $prevPage = $nextPage = '';
        if($skip>0){
            $prevPage = $current - 1;
        }
        if($type == 'SCP_project'){
            $typeArr = [1];
        }
        elseif($type == 'SCP_expansion_project'){
            $typeArr = [2];
        }else{
            $typeArr = [1,2];
        }
        $reports = Report::whereIn('status', $typeArr)->get()->pluck('id');
        $files = File::where('fileable_type','App\Models\Report\Report')->whereIn('fileable_id', $reports)->orderBy('created_at','DESC')->paginate($paginate, ['*'], 'page', $current);
        if($files->count()>0){
            if($files->count()>=$paginate){
                $nextPage = $current + 1;
                if($nextPage > $files->lastPage()){
                    $nextPage = '';
                }
            }
        }
        $allPage = ceil($files->count() / $paginate);
        return view('front.medias.report.index', compact('banner', 'files','reports','medias', 'prevPage', 'nextPage','current','type','allPage'));
    }
}
