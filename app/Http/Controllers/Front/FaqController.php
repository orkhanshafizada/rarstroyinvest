<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq\Faq;
use App\Models\Social\Social;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::get()->sortBy('sort');

        return view('front.faq.index', compact('faqs'));
    }
}
