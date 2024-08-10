<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\Image;
use App\Models\News\News;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('news.show');
        $newses = News::all()->sortByDesc('created_at');

        return view('admin.news.index', compact('newses'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('news.create');

        return view('admin.news.edit');
    }

    /**
     * @param News $news
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(News $news): View
    {
        $this->authorize('news.edit');
        return view('admin.news.edit', compact('news'));
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $this->authorize('news.create');

        $article_data = $this->translate($request);

        News::create($article_data);

        return redirect()->route('admin.news.index')->with('message', __('Succesfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param NewsUpdateRequest $request
     * @param News $news
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(NewsUpdateRequest $request, News $news): RedirectResponse
    {
        $this->authorize('news.edit');

        $article_data = $this->translate($request, $news->id);
        $news->update($article_data);

        return redirect()->route('admin.news.index')->with('message', __('Succesfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param News $news
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(News $news): RedirectResponse
    {
        $this->authorize('news.delete');

        $images = Image::where('imageable_id', $news->id)->where('imageable_type', "App\Models\News\News")->get();
        foreach($images as $image)
        {
            if($image && file_exists($image->name))
            {
                unlink($image->name);
                Image::where('id', $image->id)->delete();
            }
        }

        $news->image()->delete();
        $news->delete();

        return redirect()->back()->with('message', __('Succesfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'zh' => [
                'title'         => $request->input('zh_title'),
                'short_content' => $request->input('zh_short_content'),
                'long_content'  => $request->input('zh_long_content'),
                'slug'          => Str::slug($request->input('zh_title'), '-'),
            ],
            'en' => [
                'title'         => $request->input('en_title'),
                'short_content' => $request->input('en_short_content'),
                'long_content'  => $request->input('en_long_content'),
                'slug'          => Str::slug($request->input('en_title'), '-'),
            ],
            'ru' => [
                'title'         => $request->input('ru_title'),
                'short_content' => $request->input('ru_short_content'),
                'long_content'  => $request->input('ru_long_content'),
                'slug'          => Str::slug($request->input('ru_title'), '-'),
            ],
        ];

        $request->main_image ? $article_data['main_image'] = $this->save_file('images', $request->file('main_image'), $id, $article_data['en']['slug'], 'main_image', 'App\Models\News\News', 'news') : '';

        return $article_data;
    }
}
