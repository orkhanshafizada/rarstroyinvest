<?php

namespace App\Http\Controllers\Front\Media;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Media\Medias;
use App\Models\UsefulLink\UsefulLink;
use Illuminate\View\View;

class UsefulLinkController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $medias = Medias::with('detail')->where('type','!=', 3)->get();
        $usefullinks = UsefulLink::get()->sortByDesc('created_at');

        return view('front.medias.usefullink.index', compact('banner', 'usefullinks','medias'));
    }
}
