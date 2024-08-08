<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Http\Requests\Comment\CommentUpdateRequest;
use App\Models\Comment\Comment;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CommentController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('comments.show');
        $comments = Comment::all()->sortByDesc('created_at');

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('comments.create');

        return view('admin.comment.edit');
    }

    /**
     * @param Comment $comment
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Comment $comment): View
    {
        $this->authorize('comments.edit');
        return view('admin.comment.edit', compact('comment'));
    }

    /**
     * @param CommentRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CommentRequest $request): RedirectResponse
    {
        $this->authorize('comments.create');

        $article_data = $this->translate($request);
        Comment::create($article_data);

        return redirect()->route('admin.comment.index')->with('message', __('Succesfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param CommentUpdateRequest $request
     * @param Comment $comment
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(CommentUpdateRequest $request, Comment $comment): RedirectResponse
    {
        $this->authorize('comments.edit');

        $article_data = $this->translate($request, $comment->id);
        $comment->update($article_data);

        return redirect()->route('admin.comment.index')->with('message', __('Succesfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Comment $comment
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $this->authorize('comments.delete');

        if($comment->image && file_exists($comment->image))
        {
            deleteDirectory($comment->image);
        }

        $comment->delete();

        return redirect()->back()->with('message', __('Succesfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'active' => $request->input('active') ?: 0,
            'sort'   => $request->input('sort'),
            'zh'     => [
                'full_name'   => $request->input('zh_full_name'),
                'description' => $request->input('zh_description'),
            ],
            'en'     => [
                'full_name'   => $request->input('en_full_name'),
                'description' => $request->input('en_description'),
            ],
            'ru'     => [
                'full_name'   => $request->input('ru_full_name'),
                'description' => $request->input('ru_description'),
            ],
        ];

        $random = $id ?: rand();
        $slug = Str::slug($request->input('en_full_name').$random, '-');
        $request->image ? $article_data['image'] = $this->save_file('images', $request->file('image'), $id, $slug, 'image', 'App\Models\Comment\Comment', 'comment') : '';

        return $article_data;
    }
}
