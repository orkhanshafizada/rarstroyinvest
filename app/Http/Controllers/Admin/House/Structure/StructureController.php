<?php

namespace App\Http\Controllers\Admin\House\Structure;

use App\Http\Controllers\Controller;
use App\Http\Requests\House\Structure\StructureRequest;
use App\Models\House\Structure\Structure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StructureController extends Controller
{
    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('structure.show');
        $structures = Structure::all()->sortByDesc('created_at');

        return view('admin.house.structure.index', compact('structures'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('structure.create');

        return view('admin.house.structure.edit');
    }

    /**
     * @param faq $structure
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Structure $structure): View
    {
        $this->authorize('structure.edit');

        return view('admin.house.structure.edit', compact('structure'));
    }

    /**
     * @param StructureRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StructureRequest $request): RedirectResponse
    {
        $this->authorize('structure.create');

        $article_data = $this->translate($request);
        Structure::create($article_data);

        return redirect()->route('admin.structure.index')->with('message', __('Successfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param StructureRequest $request
     * @param Structure $structure
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(StructureRequest $request, Structure $structure): RedirectResponse
    {
        $this->authorize('structure.edit');

        $article_data = $this->translate($request);
        $structure->update($article_data);

        return redirect()->route('admin.structure.index')->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Structure $structure
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Structure $structure): RedirectResponse
    {
        $this->authorize('structure.delete');
        $structure->delete();

        return redirect()->back()->with('message', __('Successfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request)
    {
        $article_data = [
            'active' => $request->input('active'),
            'zh'     => [
                'name' => $request->input('zh_name'),
            ],
            'en'     => [
                'name' => $request->input('en_name'),
            ],
            'ru'     => [
                'name' => $request->input('ru_name'),
            ],
        ];

        return $article_data;
    }
}
