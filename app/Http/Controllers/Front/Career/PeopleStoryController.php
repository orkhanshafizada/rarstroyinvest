<?php

namespace App\Http\Controllers\Front\Career;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Career\Career;
use App\Models\PeopleStory\Story;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeopleStoryController extends Controller
{
    /**
     * @return View
     */
    public function index($current = 1): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $careers = Career::with('detail')->where('grid_type','!=', 1)->get();
        $allPage = 0;
        $paginate =6;
        $skip = ($current*$paginate)-$paginate;
        $prevPage = $nextPage = '';
        if($skip>0){
            $prevPage = $current - 1;
        }

        $stories = Story::with('detail')->orderBy('created_at','DESC')->paginate($paginate, ['*'], 'page', $current);
        if($stories->count()>0){
            if($stories->count()>=$paginate){
                $nextPage = $current + 1;
                if($nextPage > $stories->lastPage()){
                    $nextPage = '';
                }
            }
        }
        $allPage = ceil($stories->count() / $paginate);
        return view('front.career.peoplestory.index', compact('banner', 'stories','careers', 'prevPage', 'nextPage','current','allPage'));
    }
}
