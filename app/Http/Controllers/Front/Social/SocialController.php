<?php

namespace App\Http\Controllers\Front\Social;

use App\Http\Controllers\Controller;
use App\Models\Area\Area;
use App\Models\Banner;
use App\Models\Faq\Faq;
use App\Models\File;
use App\Models\Image;
use App\Models\Project\Project;
use App\Models\Region\Region;
use App\Models\Social\Social;
use Illuminate\View\View;
use function app;
use function view;

class SocialController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'operations')->first();
        $socials = Social::with('detail')->get()->sortByDesc('created_at');

        return view('front.social.index', compact('banner', 'socials'));
    }

}
