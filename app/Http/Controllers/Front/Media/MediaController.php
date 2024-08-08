<?php

namespace App\Http\Controllers\Front\Media;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Media\Medias;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'media')->first();
        $medias = Medias::with('detail')->get()->sortByDesc('created_at');

        return view('front.medias.index', compact('banner', 'medias'));
    }
}
