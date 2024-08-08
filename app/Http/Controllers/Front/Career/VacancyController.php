<?php

namespace App\Http\Controllers\Front\Career;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Career\Career;
use App\Models\Vacancy\Vacancy;
use Illuminate\View\View;

class VacancyController extends Controller
{
    /**
     * @return View
     */
    public function index($country = 'All', $current = 1): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $careers = Career::with('detail')->where('grid_type','!=', 2)->get()->sortByDesc('created_at');
        $allPage = 0;
        $paginate = 6;
        $skip = ($current*$paginate)-$paginate;
        $prevPage = $nextPage = '';
        if($skip>0){
            $prevPage = $current - 1;
        }
        if($country == 'Azerbaijan'){
            $countryArr = [1];
        }
        elseif($country == 'Georgia'){
            $countryArr = [2];
        }else{
            $countryArr = [1,2];
        }

        $vacancies = Vacancy::whereIn('country', $countryArr)->paginate($paginate, ['*'], 'page', $current);;
       // $files = File::where('fileable_type','App\Models\Report\Report')->whereIn('fileable_id', $reports)->orderBy('created_at','DESC')->paginate($paginate, ['*'], 'page', $current);
        if($vacancies->count()>0){
            if($vacancies->count()>=$paginate){
                $nextPage = $current + 1;
                if($nextPage > $vacancies->lastPage()){
                    $nextPage = '';
                }
            }
        }
        $allPage = ceil($vacancies->count() / $paginate);
        return view('front.career.vacancy.index', compact('banner', 'vacancies','careers', 'prevPage', 'nextPage','current','country','allPage'));
    }


    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $vacancy = Vacancy::with('detail')
            ->whereHas('detail.translations', function ($query) use ($slug) {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();

        $vacancies = Vacancy::where('id', '!=', $vacancy->id)->orderBy('created_at','DESC')->paginate(3);

        return view('front.career.vacancy.detail', compact('vacancy','vacancies'));
    }
}
