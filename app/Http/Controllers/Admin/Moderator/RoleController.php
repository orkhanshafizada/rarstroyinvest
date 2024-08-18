<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('moderator.show');
        $roles = Role::all()->sortByDesc('created_at');

        return view('admin.role.index', compact('roles'));
    }

    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('moderator.create');
        $permissionsGroup = Permission::orderBy('group', 'ASC')->get()->groupBy('group');

        return view('admin.role.edit', compact('permissionsGroup'));
    }

    /**
     * @param Role $role
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Role $role): View
    {
        $this->authorize('moderator.edit');
        $permissionsGroup = Permission::orderBy('group', 'ASC')->get()->groupBy('group');

        return view('admin.role.edit', compact('role', 'permissionsGroup'));
    }

    /**
     * @param RoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $this->authorize('moderator.edit');

        $data = $request->validated();
        $role->update($data);
        $permissions = $this->getValidPermissions($request->permissions);
        $role->syncPermissions($permissions);

        return redirect()->route('admin.role.index')
                         ->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param RoleRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $this->authorize('moderator.create');

        $data = $request->validated();
        $data['guard_name'] = 'admin';
        $role = Role::create($data);
        $permissions = $this->getValidPermissions($request->permissions);
        $role->syncPermissions($permissions);

        return redirect()
            ->route('admin.role.index')
            ->with('message', __('Successfully created.'))
            ->with('message-alert', 'success');
    }

    /**
     * @param Role $role
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->authorize('moderator.delete');
        $role->delete();

        return redirect()
            ->route('admin.role.index')
            ->with('message', __('Successfully deleted.'))
            ->with('message-alert', 'success');
    }

    /**
     * Get valid permissions for the role.
     *
     * @param array $permissionIds
     * @return \Illuminate\Support\Collection
     */
    protected function getValidPermissions(array $permissionIds)
    {
        return Permission::whereIn('id', $permissionIds)
                         ->where('guard_name', 'admin')
                         ->pluck('name');
    }
}
