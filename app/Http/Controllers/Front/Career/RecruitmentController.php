<?php

namespace App\Http\Controllers\Front\Career;

use App\Http\Controllers\Controller;
use App\Models\Career\Career;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecruitmentController extends Controller
{
    public function index($slug): View
    {
        $career = Career::with('detail')
            ->whereHas('detail.translations', function ($query) use ($slug) {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();

        $careers = Career::where('id', '!=', $career->id)->get();

        return view('front.career.recruitment.index', compact('career','careers'));
    }
}
