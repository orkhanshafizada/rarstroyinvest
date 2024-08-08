<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Partner\Partner;
use App\Models\Staff\Staff;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $aboutus  = About::where('id', 1)->first();
        $partners = Partner::active()->get()->sortBy('sort');
        $staffs   = Staff::active()->get()->sortBy('sort');

        return view('front.about.about', compact('aboutus', 'partners', 'staffs'));
    }
}
