<?php

namespace App\Http\Controllers\Admin\House\House;

use App\Http\Controllers\Controller;
use App\Models\House\Filter\Filter;
use App\Models\House\House\House;
use App\Models\House\Structure\Structure;
use App\Models\Image;
use App\Traits\GeneralTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('house.show');
        $houses = House::latest()->get();

        return view('admin.house.house.index', ['houses' => $houses]);
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('house.create');

        return view('admin.house.house.edit', [
            'structures' => Structure::active()->latest()->get(),
            'filters'    => Filter::active()->latest()->get(),
        ]);
    }

    /**
     * @param House $house
     * @return View
     * @throws AuthorizationException
     */
    public function show(House $house): View
    {
        $this->authorize('house.edit');

        return view('admin.house.house.edit', [
            'house'      => $house,
            'structures' => Structure::active()->latest()->get(),
            'filters'    => Filter::active()->latest()->get(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->saveHouse($request);
    }

    /**
     * @param Request $request
     * @param House $house
     * @return RedirectResponse
     */
    public function update(Request $request, House $house): RedirectResponse
    {
        return $this->saveHouse($request, $house);
    }

    /**
     * @param Request $request
     * @param House|null $house
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    protected function saveHouse(Request $request, House $house = null): RedirectResponse
    {
        $this->authorize($house ? 'house.edit' : 'house.create');

        $validator = $this->validateData($request, $house !== null);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $house = $house ? $this->updateHouse($house, $request) : $this->createHouse($request);
        $this->syncHouseStructures($house, $request->all());
        $this->syncHouseFilters($house, $request->all());

        $message = $house->wasRecentlyCreated ? 'Successfully created.' : 'Successfully updated.';

        return redirect()->route('admin.house.index')
                         ->with('message', __($message))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Request $request
     * @return House
     */
    protected function createHouse(Request $request): House
    {
        return House::create($this->translate($request));
    }

    /**
     * @param House $house
     * @param Request $request
     * @return House
     */
    protected function updateHouse(House $house, Request $request): House
    {
        $house->update($this->translate($request));
        return $house;
    }

    /**
     * @param House $house
     * @param array $data
     * @return void
     */
    protected function syncHouseStructures(House $house, array $data): void
    {
        $structures = collect($data)
            ->filter(fn($value, $key) => preg_match('/^st_price_(\d+)$/', $key, $matches))
            ->map(fn($value, $key) => [
                'house_id'     => $house->id,
                'structure_id' => (int)preg_replace('/^st_price_(\d+)$/', '$1', $key),
                'price'        => $value,
            ])
            ->all();

        $house->structures()->sync($structures);
    }

    /**
     * @param House $house
     * @param array $data
     * @return void
     */
    protected function syncHouseFilters(House $house, array $data): void
    {
        $filters = collect($data)
            ->filter(fn($value, $key) => preg_match('/^filter_value_(\d+)$/', $key, $matches))
            ->map(fn($value, $key) => [
                'house_id'  => $house->id,
                'filter_id' => (int)preg_replace('/^filter_value_(\d+)$/', '$1', $key),
                'value'     => $value,
            ])
            ->all();

        $house->filters()->sync($filters);
    }

    /**
     * @param House $house
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(House $house): RedirectResponse
    {
        $this->authorize('house.delete');

        $house->structures()->detach();
        $house->filters()->detach();

        $images = Image::where('imageable_id', $house->id)->where('imageable_type', "App\Models\House\House\House")->get();
        foreach($images as $image)
        {
            if($image && file_exists($image->name))
            {
                unlink($image->name);
                Image::where('id', $image->id)->delete();
            }
        }

        $house->image()->delete();
        $house->delete();

        return redirect()->back()
                         ->with('message', __('Successfully deleted.'))
                         ->with('message-alert', 'success');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    private function translate(Request $request, int $id = 0): array
    {
        $slug = Str::slug($request->input('en_name'), '-');

        $articleData = [
            'active'   => $request->input('active'),
            'location' => $request->input('location'),
            'zh'       => [
                'name'      => $request->input('zh_name'),
                'video_url' => $request->input('zh_video_url'),
                'slug'      => $slug,
            ],
            'en'       => [
                'name'      => $request->input('en_name'),
                'video_url' => $request->input('en_video_url'),
                'slug'      => $slug,
            ],
            'ru'       => [
                'name'      => $request->input('ru_name'),
                'video_url' => $request->input('ru_video_url'),
                'slug'      => $slug,
            ],
        ];

        if ($request->hasFile('main_image')) {
            $articleData['main_image'] = $this->save_file('images', $request->file('main_image'), $id, $slug, 'main_image', 'App\Models\House\House\House', 'house');
        }

        return $articleData;
    }

    /**
     * @param Request $request
     * @param bool $isUpdate
     * @return \Illuminate\Validation\Validator
     */
    private function validateData(Request $request, bool $isUpdate = false)
    {
        $rules = [
            'active'       => 'required|boolean',
            'location'     => 'required|string|max:255',
            'en_name'      => 'required|string|max:255',
            'en_video_url' => 'nullable|string|max:255',
            'ru_name'      => 'required|string|max:255',
            'ru_video_url' => 'nullable|string|max:255',
            'zh_name'      => 'nullable|string|max:255',
            'zh_video_url' => 'nullable|string|max:255',
        ];

        if (!$isUpdate) {
            $rules['main_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return Validator::make($request->all(), $rules);
    }
}
