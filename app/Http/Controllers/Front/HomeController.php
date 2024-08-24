<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Comment\Comment;
use App\Models\House\House\House;
use App\Models\Partner\Partner;
use App\Models\Slider\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('front.dashboard.index', [
                'sliders'      => Slider::active()->get()->sortBy('sort'),
                'partners'     => Partner::active()->get()->sortBy('sort'),
                'comments'     => Comment::active()->get()->sortBy('sort'),
                'aboutus'      => About::where('id', 1)->first(),
                'houses' => House::active()->orderBy('created_at', 'DESC')->paginate(12),
            ]);
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $slider = Slider::with('image')->whereHas('translations', function($query) use ($slug)
            {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();

        return view('front.dashboard.sliderDetail', compact('slider'));
    }
}
