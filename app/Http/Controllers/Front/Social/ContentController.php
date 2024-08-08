<?php

namespace App\Http\Controllers\Front\Social;

use App\Http\Controllers\Controller;
use App\Models\Area\Area;
use App\Models\Faq\Faq;
use App\Models\File;
use App\Models\Project\Project;
use App\Models\Region\Region;
use App\Models\Social\Social;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function index($slug): View
    {
        $social = Social::with('detail')
            ->whereHas('detail.translations', function ($query) use ($slug) {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();

        $socials = Social::where('id', '!=', $social->id)->get();

        return view('front.social.content.index', compact('social','socials'));
    }
}
