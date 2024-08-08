<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\FaqRequest;
use App\Models\Faq\Faq;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('faqs.show');
        $faqs = Faq::all()->sortByDesc('created_at');

        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('faqs.create');

        return view('admin.faqs.edit');
    }

    /**
     * @param faq $faq
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Faq $faq): View
    {
        $this->authorize('faqs.edit');

        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * @param FaqRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(FaqRequest $request): RedirectResponse
    {
        $this->authorize('faqs.create');

        $article_data = $this->translate($request);
        Faq::create($article_data);

        return redirect()->route('admin.faq.index')
            ->with('message', __('Successfully created.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param FaqRequest $request
     * @param Faq $faq
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $this->authorize('faqs.edit');

        $article_data = $this->translate($request);
        $faq->update($article_data);

        return redirect()
            ->route('admin.faq.index')
            ->with('message', __('Successfully updated.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param Faq $faq
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $this->authorize('faqs.delete');
        $faq->delete();

        return redirect()
            ->back()
            ->with('message', __('Successfully deleted.'))
            ->with('message-alert', 'success');
    }

    private function translate($request)
    {
        $article_data = [
            'sort' => $request->input('sort') ?? 1,
            'zh' => [
                'title' => $request->input('zh_title'),
                'content' => $request->input('zh_content'),
            ],
            'en' => [
                'title' => $request->input('en_title'),
                'content' => $request->input('en_content'),
            ],
            'ru' => [
                'title' => $request->input('ru_title'),
                'content' => $request->input('ru_content'),
            ],
        ];

        return $article_data;
    }
}
