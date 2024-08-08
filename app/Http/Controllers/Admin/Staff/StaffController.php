<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\StaffRequest;
use App\Http\Requests\Staff\StaffUpdateRequest;
use App\Models\Staff\Staff;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StaffController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('staff.show');
        $staffs = Staff::all()->sortByDesc('created_at');

        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('staff.create');

        return view('admin.staff.edit');
    }

    /**
     * @param Staff $staff
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Staff $staff): View
    {
        $this->authorize('staff.edit');
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * @param StaffRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StaffRequest $request): RedirectResponse
    {
        $this->authorize('staff.create');

        $article_data = $this->translate($request);
        Staff::create($article_data);

        return redirect()->route('admin.staff.index')->with('message', __('Succesfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param StaffUpdateRequest $request
     * @param Staff $staff
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(StaffUpdateRequest $request, Staff $staff): RedirectResponse
    {
        $this->authorize('staff.edit');

        $article_data = $this->translate($request, $staff->id);
        $staff->update($article_data);

        return redirect()->route('admin.staff.index')->with('message', __('Succesfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Staff $staff
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Staff $staff): RedirectResponse
    {
        $this->authorize('staff.delete');

        if($staff->image && file_exists($staff->image))
        {
            deleteDirectory($staff->image);
        }

        $staff->delete();

        return redirect()->back()->with('message', __('Succesfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request, $id = 0)
    {
        $article_data = [
            'active' => $request->input('active'),
            'sort'   => $request->input('sort'),
            'zh'     => [
                'full_name'   => $request->input('zh_full_name'),
                'position'    => $request->input('zh_position'),
                'description' => $request->input('zh_description'),
            ],
            'en'     => [
                'full_name'   => $request->input('en_full_name'),
                'position'    => $request->input('en_position'),
                'description' => $request->input('en_description'),
            ],
            'ru'     => [
                'full_name'   => $request->input('ru_full_name'),
                'position'    => $request->input('ru_position'),
                'description' => $request->input('ru_description'),
            ],
        ];

        $random = $id ?: rand();
        $slug = Str::slug($request->input('en_full_name').$random, '-');
        $request->image ? $article_data['image'] = $this->save_file('images', $request->file('image'), $id, $slug, 'image', 'App\Models\Staff\Staff', 'staff') : '';

        return $article_data;
    }
}
