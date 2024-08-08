<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PermissionController extends Controller
{
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('moderator.show');
        $permissions = Permission::all()->sortByDesc('created_at');

        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('moderator.create');

        return view('admin.permission.edit');
    }

    /**
     * @param Permission $permission
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Permission $permission): View
    {
        $this->authorize('moderator.edit');

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PermissionRequest $request, Permission $permission): RedirectResponse
    {
        $this->authorize('moderator.edit');

        $permission->update($request->validated());

        return redirect()
            ->route('admin.permission.index')
            ->with('message', __('Succesfully updated.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param PermissionRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PermissionRequest $request): RedirectResponse
    {
        $this->authorize('moderator.create');

        $data = $request->validated();
        $data['guard_name'] = 'admin';
        Permission::create($data);

        return redirect()
            ->route('admin.permission.index')
            ->with('message', __('Succesfully created.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->authorize('moderator.delete');

        $roles = DB::table('role_has_permissions')->where('permission_id', $id)->get();
        $permission = Permission::find($id);
        foreach ($roles as $rol) {
            $role = Role::find($rol->role_id);
            $role->revokePermissionTo($permission->name);
        }
        $permission->delete();

        return redirect()
            ->route('admin.permission.index')
            ->with('message', __('Succesfully deleted.'))
            ->with('message-alert', 'success');
    }
}
