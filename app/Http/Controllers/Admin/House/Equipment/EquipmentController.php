<?php

namespace App\Http\Controllers\Admin\House\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\House\Equipment\EquipmentRequest;
use App\Models\House\Equipment\Equipment;
use App\Models\House\Structure\Structure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EquipmentController extends Controller
{
    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index($house_id): View
    {
        $this->authorize('equipment.show');
        $equipments = Equipment::where('house_id', $house_id)->get()->sortByDesc('sort');

        return view('admin.house.equipment.index', compact('equipments', 'house_id'));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create($house_id): View
    {

        $this->authorize('equipment.create');

        return view('admin.house.equipment.edit', [
            'structures' => Structure::active()->latest()->get(),
            'house_id'   => $house_id
        ]);
    }

    /**
     * @param Equipment $equipment
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Equipment $equipment): View
    {
        $this->authorize('equipment.edit');

        return view('admin.house.equipment.edit', [
            'structures' => Structure::active()->latest()->get(),
            'equipment'  => $equipment,
            'house_id'   => $equipment->house_id
        ]);
    }

    /**
     * @param EquipmentRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(EquipmentRequest $request): RedirectResponse
    {
        $this->authorize('equipment.create');

        $article_data = $this->translate($request);
        Equipment::create($article_data);

        return redirect()->route('admin.equipment.index', $article_data['house_id'])
                         ->with('message', __('Successfully created.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param EquipmentRequest $request
     * @param Equipment $equipment
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(EquipmentRequest $request, Equipment $equipment): RedirectResponse
    {
        $this->authorize('equipment.edit');

        $article_data = $this->translate($request);
        $equipment->update($article_data);

        return redirect()->route('admin.equipment.index', $article_data['house_id'])
                         ->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Equipment $equipment
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Equipment $equipment): RedirectResponse
    {
        $this->authorize('equipments.delete');
        $equipment->delete();

        return redirect()->back()->with('message', __('Successfully deleted.'))->with('message-alert', 'success');
    }

    private function translate($request)
    {
        $article_data = [
            'sort'         => $request->input('sort') ?? 1,
            'house_id'     => $request->input('house_id'),
            'structure_id' => $request->input('structure_id'),
            'zh'           => [
                'title'   => $request->input('zh_title'),
                'content' => $request->input('zh_content'),
            ],
            'en'           => [
                'title'   => $request->input('en_title'),
                'content' => $request->input('en_content'),
            ],
            'ru'           => [
                'title'   => $request->input('ru_title'),
                'content' => $request->input('ru_content'),
            ],
        ];

        return $article_data;
    }
}
