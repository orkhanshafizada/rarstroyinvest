<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModeratorRequest;
use App\Http\Requests\ModeratorStoreRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ModeratorController extends Controller
{
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('moderator.show');
        $moderators = User::all()->sortByDesc('created_at');

        return view('admin.moderator.index', compact('moderators'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('moderator.create');
        $roles = Role::get();

        return view('admin.moderator.edit', compact('roles'));
    }

    /**
     * @param User $moderator
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(User $moderator): View
    {
        $this->authorize('moderator.edit');
        $roles = Role::get();

        return view('admin.moderator.edit', compact('moderator', 'roles'));
    }

    /**
     * @param ModeratorRequest $request
     * @param User $moderator
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ModeratorRequest $request, User $moderator): RedirectResponse
    {
        $this->authorize('moderator.edit');

        $data = $request->validated();
        unset($data['role']);
        $data['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        $moderator->update($data);
        $moderator->syncRoles($request->role);

        return redirect()->route('admin.moderator.index')
            ->with('message', __('Succesfully updated.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param ModeratorStoreRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ModeratorStoreRequest $request): RedirectResponse
    {
        $this->authorize('moderator.create');

        $data = $request->validated();
        unset($data['role']);
        $data['password'] = Hash::make($data['password']);
        $admin = User::create($data);
        $admin->syncRoles($request->role);

        return redirect()->route('admin.moderator.index')
            ->with('message', __('Succesfully created.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param User $moderator
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $moderator): RedirectResponse
    {
        $this->authorize('moderator.delete');
        $moderator->delete();

        return redirect()->route('admin.moderator.index')
            ->with('message', __('Succesfully deleted.'))
            ->with('message-alert', 'success');
    }
}
