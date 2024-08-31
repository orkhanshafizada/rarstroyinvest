<?php

namespace App\Http\Controllers\Admin\House\Mortgage;

use App\Http\Controllers\Controller;
use App\Http\Requests\House\Mortgage\MortgageRequest;
use App\Http\Requests\House\Mortgage\MortgageUpdateRequest;
use App\Models\House\Mortgage\Mortgage;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MortgageController extends Controller
{
    use GeneralTrait;
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('mortgage.show');
        $mortgages = Mortgage::all()->sortByDesc('created_at');

        return view('admin.house.mortgage.index', compact('mortgages'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('mortgage.create');

        return view('admin.house.mortgage.edit');
    }

    /**
     * @param Mortgage $mortgage
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Mortgage $mortgage): View
    {
        $this->authorize('mortgage.edit');

        return view('admin.house.mortgage.edit', compact('mortgage'));
    }

    /**
     * @param MortgageRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(MortgageRequest $request): RedirectResponse
    {
        $this->authorize('mortgage.create');
        $article_data = $this->translate($request);

        Mortgage::create($article_data);

        return redirect()->route('admin.mortgage.index')->with('message', __('Successfully updated.'))->with('message-alert', 'success');
    }

    /**
     * @param MortgageRequest $request
     * @param Mortgage $mortgage
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(MortgageUpdateRequest $request, Mortgage $mortgage): RedirectResponse
    {
        $this->authorize('mortgage.edit');
        $article_data = $this->translate($request, $mortgage->id);

        $mortgage->update($article_data);

        return redirect()->route('admin.mortgage.index')->with('message', __('Successfully updated.'))->with('message-alert', 'success');
    }

    /**
     * @param Mortgage $mortgage
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Mortgage $mortgage): RedirectResponse
    {
        $this->authorize('mortgage.delete');

        if (file_exists($mortgage->image)) deleteDirectory($mortgage->image);

        $mortgage->delete();

        return redirect()->route('admin.mortgage.index')->with('message', 'Succesfully deleted.')->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'active' => $request->input('active'),
            'sort'   => $request->input('sort'),
        ];

        $slug = $id ?: rand();
        $request->image ? $article_data['image'] = $this->saveFile('images', $request->file('image'), $id, $slug, 'image', 'App\Models\House\Mortgage\Mortgage', 'mortgage') : '';

        return $article_data;
    }

}
