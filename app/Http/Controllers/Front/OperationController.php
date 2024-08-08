<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Operations\Operation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OperationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $banner = Banner::where('category', 'operations')->first();
        $operations = Operation::with('detail')->get()->sortByDesc('created_at');

        return view('front.operation.operation', compact('banner', 'operations'));
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $operation = Operation::with('detail')
            ->whereHas('detail.translations', function ($query) use ($slug) {
                $query->where('locale', 'en');
                $query->where('slug', $slug);
            })->first();

        $operations = Operation::where('id', '!=', $operation->id)->get();
        return view('front.operation.detail', compact('operation','operations'));
    }
}
