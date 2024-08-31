<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\AboutUpdateRequest;
use App\Models\About\About;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    use GeneralTrait;

    /**
     * @param Request $request
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(About $about): View
    {
        $this->authorize('about.show');
        $this->authorize('about.edit');


        return view('admin.about-us.edit', [
            'about'       => $about,
            'category_id' => 1,
            'type'        => 1,
            'image_type'  => 'default'
        ]);
    }

    public function update(AboutUpdateRequest $request, About $about): RedirectResponse
    {
        $this->authorize('about.edit');

        $article_data = $this->translate($request, $about->id);
        $about->update($article_data);

        return redirect()->back()->with('message', __('Succesfully updated.'))->with('message-alert', 'success');
    }

    private function translate($request, $id)
    {
        $slug = Str::slug($request->input('en_title'), '-');

        $article_data = [
            'zh' => [
                'title'             => $request->input('zh_title'),
                'short_description' => $request->input('zh_short_description'),
                'long_description'  => $request->input('zh_long_description'),
                'slug'              => Str::slug($request->input('zh_title'), '-'),
            ],
            'en' => [
                'title'             => $request->input('en_title'),
                'short_description' => $request->input('en_short_description'),
                'long_description'  => $request->input('en_long_description'),
                'slug'              => Str::slug($request->input('en_title'), '-'),
            ],
            'ru' => [
                'title'             => $request->input('ru_title'),
                'short_description' => $request->input('ru_short_description'),
                'long_description'  => $request->input('ru_long_description'),
                'slug'              => Str::slug($request->input('ru_title'), '-'),
            ],

        ];

        $request->image ? $article_data['image'] = $this->saveFile('images', $request->file('image'), $id, $slug, 'image', 'App\Models\About\About', 'about') : '';

        return $article_data;
    }

}
