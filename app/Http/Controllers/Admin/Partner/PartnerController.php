<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\PartnerRequest;
use App\Http\Requests\Partner\PartnerUpdateRequest;
use App\Models\Partner\Partner;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PartnerController extends Controller
{
    use GeneralTrait;
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('partners.show');
        $partners = Partner::all()->sortByDesc('created_at');

        return view('admin.partner.index', compact('partners'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('partners.create');

        return view('admin.partner.edit');
    }

    /**
     * @param Partner $partner
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Partner $partner): View
    {
        $this->authorize('partners.edit');

        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * @param PartnerRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PartnerRequest $request): RedirectResponse
    {
        $this->authorize('partners.create');
        $article_data = $this->translate($request);

        // Create the partner
        Partner::create($article_data);

        return redirect()->route('admin.partner.index')->with('message', __('Successfully updated.'))->with('message-alert', 'success');
    }

    /**
     * @param PartnerRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PartnerUpdateRequest $request, Partner $partner): RedirectResponse
    {
        $this->authorize('partners.edit');
        $article_data = $this->translate($request, $partner->id);

        $partner->update($article_data);

        return redirect()->route('admin.partner.index')->with('message', __('Successfully updated.'))->with('message-alert', 'success');
    }

    /**
     * @param Partner $partner
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        $this->authorize('partners.delete');

        if (file_exists($partner->image)) deleteDirectory($partner->image);

        $partner->delete();

        return redirect()->route('admin.partner.index')->with('message', 'Succesfully deleted.')->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'active' => $request->input('active'),
            'sort'   => $request->input('sort'),
        ];

        $slug = $id ?: rand();
        $request->image ? $article_data['image'] = $this->saveFile('images', $request->file('image'), $id, $slug, 'image', 'App\Models\Partner\Partner', 'partner') : '';

        return $article_data;
    }

}
