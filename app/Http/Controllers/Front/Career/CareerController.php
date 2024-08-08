<?php

namespace App\Http\Controllers\Front\Career;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Career\Career;
use App\Models\PeopleStory\Story;
use App\Models\Vacancy\Vacancy;
use Illuminate\View\View;
use function view;

class CareerController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'careers')->first();
        $careers = Career::with('detail')->get()->sortByDesc('created_at');

        return view('front.career.index', compact('banner', 'careers'));
    }
}
