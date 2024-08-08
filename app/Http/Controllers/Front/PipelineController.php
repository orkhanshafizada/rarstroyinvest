<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Operations\Operation;
use App\Models\Pipeline\Pipeline;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PipelineController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'pipelines')->first();
        $pipelines = Pipeline::with('detail')->get()->sortByDesc('created_at');

        return view('front.pipeline.pipeline', compact('banner', 'pipelines'));
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $pipeline = Pipeline::has('detail')->with('detail.translations', function ($query) use ($slug) {
            $query->where('locale', app()->getLocale());
            $query->where('slug', $slug);
        })->first();
        $pipelines = Pipeline::where('id', '!=', $pipeline->id)->get();

        return view('front.pipeline.detail', compact('pipeline','pipelines'));
    }
}
