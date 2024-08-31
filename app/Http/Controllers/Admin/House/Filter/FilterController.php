<?php

namespace App\Http\Controllers\Admin\House\Filter;

use App\Http\Controllers\Controller;
use App\Http\Requests\House\Filter\FilterRequest;
use App\Http\Requests\House\Filter\FilterUpdateRequest;
use App\Models\House\Filter\Filter;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FilterController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('filter.show');
        $filters = Filter::all()->sortByDesc('created_at');

        return view('admin.house.filter.index', compact('filters'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('filter.create');

        return view('admin.house.filter.edit');
    }

    /**
     * @param Filter $filter
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Filter $filter): View
    {
        $this->authorize('filter.edit');
        return view('admin.house.filter.edit', compact('filter'));
    }

    /**
     * @param FilterRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(FilterRequest $request): RedirectResponse
    {
        $this->authorize('filter.create');

        $article_data = $this->translate($request);
        Filter::create($article_data);

        return redirect()->route('admin.filter.index')->with('message', __('Succesfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param FilterUpdateRequest $request
     * @param Filter $filter
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(FilterUpdateRequest $request, Filter $filter): RedirectResponse
    {
        $this->authorize('filter.edit');

        $article_data = $this->translate($request, $filter->id);
        $filter->update($article_data);

        return redirect()->route('admin.filter.index')->with('message', __('Succesfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Filter $filter
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Filter $filter): RedirectResponse
    {
        $this->authorize('filter.delete');
        $filter->delete();

        return redirect()->back()->with('message', __('Succesfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'active' => $request->input('active'),
            'sort'   => $request->input('sort'),
            'zh'     => [
                'name'   => $request->input('zh_name'),
            ],
            'en'     => [
                'name'   => $request->input('en_name'),
            ],
            'ru'     => [
                'name'   => $request->input('ru_name'),
            ],
        ];

        $random = $id ?: rand();
        $slug   = Str::slug($request->input('ru_name') . $random, '-');
        $request->image ? $article_data['image'] = $this->saveFile('images', $request->file('image'), $id, $slug, 'image', 'App\Models\Filter\Filter', 'filter') : '';

        return $article_data;
    }
}
