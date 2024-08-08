<?php

namespace App\Http\Controllers\Front\Media;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Media\Medias;
use App\Models\MediaContact\MediaContact;
use Illuminate\View\View;

class MediaContactController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'about-us')->first();
        $medias = Medias::with('detail')->where('type','!=', 4)->get();
        $mediacontacts = MediaContact::get()->sortByDesc('created_at');

        return view('front.medias.mediacontact.index', compact('banner', 'mediacontacts','medias'));
    }
}
