<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @return View
     */
    public function index($current = 1): View
    {
        $paginate = 10;
        $skip = ($current - 1) * $paginate;
        $totalNews = News::count();
        $allPage = ceil($totalNews / $paginate);
        $news = News::orderBy('created_at', 'DESC')->skip($skip)->take($paginate)->get();

        $prevPage = $current > 1 ? $current - 1 : null;
        $nextPage = $current < $allPage ? $current + 1 : null;

        return view('front.news.index', compact('news', 'prevPage', 'nextPage', 'current', 'allPage'));
    }

    /**
     * Display the specified news item.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $news = News::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug)
                  ->where('locale', 'ru');
        })->firstOrFail();

        $news->increment('show');

        $newses = News::where('id', '!=', $news->id)
                      ->orderBy('created_at', 'DESC')
                      ->paginate(12);
        $currentUrl = url()->current();

        return view('front.news.detail', compact('news', 'currentUrl', 'newses'));
    }
}
