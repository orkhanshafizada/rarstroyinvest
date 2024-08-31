<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Requests\Slider\SliderUpdateRequest;
use App\Models\Slider\Slider;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SliderController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('slider.show');
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('slider.create');

        return view('admin.slider.edit');
    }

    /**
     * @param Slider $slider
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Slider $slider): View
    {
        $this->authorize('slider.edit');

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * @param SliderRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(SliderRequest $request): RedirectResponse
    {
        $this->authorize('slider.create');
        $article_data = $this->translate($request);

        // Separate main data and translated data
        $main_data = [
            'type'      => $article_data['type'],
            'active'    => $article_data['active'],
            'sort'      => $article_data['sort'],
            'image'     => $article_data['image'] ?? null,
        ];

        // Create the slider
        $slider = Slider::create($main_data);

        // Save translations
        foreach(config('app.supported_locales') as $locale)
        {
            $slider->translateOrNew($locale)->fill($article_data[$locale]);
        }

        $slider->save();

        return redirect()->route('admin.slider.index')->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param SliderUpdateRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SliderUpdateRequest $request, Slider $slider): RedirectResponse
    {
        $this->authorize('slider.edit');
        $article_data = $this->translate($request, $slider->id);

        // Separate main data and translated data
        $main_data = [
            'type'   => $article_data['type'],
            'active' => $article_data['active'],
            'sort'   => $article_data['sort'],
        ];

        $request->image ? $main_data['image'] = $article_data['image'] : '';
        $request->thumbnail ? $main_data['thumbnail'] = $article_data['thumbnail'] : '';

        // Update the slider
        $slider->update($main_data);

        // Save translations
        foreach(config('app.supported_locales') as $locale)
        {
            $slider->translateOrNew($locale)->fill($article_data[$locale]);
        }

        $slider->save();

        return redirect()->route('admin.slider.index')->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Slider $slider
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        $this->authorize('slider.delete');

        if(file_exists($slider->image)) deleteDirectory($slider->image);
        if(file_exists($slider->thumbnail)) deleteDirectory($slider->thumbnail);

        $slider->delete();

        return redirect()->route('admin.slider.index')->with('message', 'Succesfully deleted.')
                         ->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $slug         = Str::slug($request->input('en_title'), '-');
        $article_data = [
            'type'   => $request->input('type'),
            'active' => $request->input('active'),
            'sort'   => $request->input('sort'),
            'en'     => [
                'title'   => $request->input('en_title'),
                'link'    => $request->input('en_link'),
                'content' => $request->input('en_content'),
                'slug'    => $slug,
            ],
            'ru'     => [
                'title'   => $request->input('ru_title'),
                'link'    => $request->input('ru_link'),
                'content' => $request->input('ru_content'),
                'slug'    => $slug,
            ],
            'zh'     => [
                'title'   => $request->input('zh_title'),
                'link'    => $request->input('zh_link'),
                'content' => $request->input('zh_content'),
                'slug'    => $slug,
            ],
        ];

        $slug_thumbnail = 'slider_'.$slug;
        $request->image ? $article_data['image'] = $this->saveFile('images', $request->file('image'), $id, $slug_thumbnail, 'image', 'App\Models\Slider\Slider', 'slider') : '';

        return $article_data;
    }

}
