<?php

namespace App\Http\Controllers\Admin\House\Portfolio;

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

class PortfolioController extends Controller
{
    use GeneralTrait;

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('portfolio.show');
        $houses = House::portfolio()->latest()->get();

        return view('admin.house.portfolio.index', ['houses' => $houses]);
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('portfolio.create');

        return view('admin.house.portfolio.edit', [
            'filters'    => Filter::active()->orderBy('sort')->get(),
        ]);
    }

    /**
     * @param House $portfolio
     * @return View
     * @throws AuthorizationException
     */
    public function show(House $portfolio): View
    {
        $this->authorize('portfolio.edit');

        return view('admin.house.portfolio.edit', [
            'house'      => $portfolio,
            'filters'    => Filter::active()->orderBy('sort')->get(),
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
     * @param House $portfolio
     * @return RedirectResponse
     */
    public function update(Request $request, House $portfolio): RedirectResponse
    {
        return $this->saveHouse($request, $portfolio);
    }

    /**
     * @param Request $request
     * @param House|null $portfolio
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    protected function saveHouse(Request $request, House $portfolio = null): RedirectResponse
    {
        $this->authorize($portfolio ? 'house.edit' : 'house.create');

        $validator = $this->validateData($request, $portfolio !== null);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $portfolio = $portfolio ? $this->updateHouse($portfolio, $request) : $this->createHouse($request);
        $this->syncHouseStructures($portfolio, $request->all());
        $this->syncHouseFilters($portfolio, $request->all());

        $message = $portfolio->wasRecentlyCreated ? 'Successfully created.' : 'Successfully updated.';

        return redirect()->route('admin.portfolio.index')
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
     * @param House $portfolio
     * @param Request $request
     * @return House
     */
    protected function updateHouse(House $portfolio, Request $request): House
    {
        $portfolio->update($this->translate($request));
        return $portfolio;
    }

    /**
     * @param House $portfolio
     * @param array $data
     * @return void
     */
    protected function syncHouseStructures(House $portfolio, array $data): void
    {
        $structures = collect($data)
            ->filter(function($value, $key) {
                return preg_match('/^st_price_(\d+)$/', $key, $matches) && !is_null($value) && trim($value) !== '';
            })
            ->map(function($value, $key) use ($portfolio) {
                return [
                    'house_id'     => $portfolio->id,
                    'structure_id' => (int)preg_replace('/^st_price_(\d+)$/', '$1', $key),
                    'price'        => $value,
                ];
            })
            ->filter(function($structure) {
                return !is_null($structure['price']) && trim($structure['price']) !== '';
            })
            ->all();

        if (!empty($structures)) {
            $portfolio->structures()->sync($structures);
        }
    }

    /**
     * @param House $portfolio
     * @param array $data
     * @return void
     */
    protected function syncHouseFilters(House $portfolio, array $data): void
    {
        $filters = collect($data)
            ->filter(function($value, $key) {
                return preg_match('/^filter_value_(\d+)$/', $key, $matches) && !is_null($value) && trim($value) !== '';
            })
            ->map(function($value, $key) use ($portfolio) {
                return [
                    'house_id'  => $portfolio->id,
                    'filter_id' => (int)preg_replace('/^filter_value_(\d+)$/', '$1', $key),
                    'value'     => $value,
                ];
            })
            ->filter(function($filter) {
                return !is_null($filter['value']) && trim($filter['value']) !== '';
            })
            ->all();

        if (!empty($filters)) {
            $portfolio->filters()->sync($filters);
        }
    }


    /**
     * @param House $portfolio
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(House $portfolio): RedirectResponse
    {
        $this->authorize('portfolio.delete');

        $portfolio->structures()->detach();
        $portfolio->filters()->detach();

        $images = Image::where('imageable_id', $portfolio->id)->where('imageable_type', "App\Models\House\House\House")->get();
        foreach($images as $image)
        {
            if($image && file_exists($image->name))
            {
                unlink($image->name);
                Image::where('id', $image->id)->delete();
            }
        }

        $portfolio->image()->delete();
        $portfolio->delete();

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
        $slug = Str::slug($request->input('ru_name'), '-');

        $articleData = [
            'type'      => "portfolio",
            'active'    => $request->input('active'),
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
            $articleData['main_image'] = $this->saveFile('images', $request->file('main_image'), $id, $slug, 'main_image', 'App\Models\House\House\House', 'house');
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
            'en_name'      => 'nullable|string|max:255',
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
