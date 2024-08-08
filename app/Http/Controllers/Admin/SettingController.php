<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    use GeneralTrait;
    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('settings.show');
        $settings = Setting::all();

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * @param SettingRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SettingRequest $request): RedirectResponse
    {
        $this->authorize('settings.edit');

        $setting = array_map("htmlspecialchars", $request->validated());

        $setting['logo_white'] = $this->checklogo_white($request);
        $setting['logo_colorful'] = $this->checklogo_colorful($request);
        $setting['favicon'] = $this->checkLogoFavicon($request);
        foreach ($setting as $key => $req) {
            Setting::where('setting_key', $key)
                ->update([
                    'setting_value' => $req
                ]);
        }

        return redirect()->route('admin.config')
            ->with('message', __('Succesfully updated.'))
            ->with('message-alert', 'success');
    }

    private function checklogo_white($request)
    {
        $logo_white = setting('logo_white');
        if ($request->logo_white) {
            deleteDirectory(setting('logo_white'));
            $logo_white = $this->upload_file($request->file('logo_white'), 'setting/logo_white', 'images');
        }

        return $logo_white;
    }

    private function checklogo_colorful($request)
    {
        $logo_colorful = setting('logo_colorful');
        if ($request->logo_colorful) {
            deleteDirectory(setting('logo_colorful'));
            $logo_colorful = $this->upload_file($request->file('logo_colorful'), 'setting/logo_colorful', 'images');
        }

        return $logo_colorful;
    }

    private function checkLogoFavicon($request)
    {
        $favicon = setting('favicon');
        if ($request->favicon) {
            deleteDirectory(setting('favicon'));
            $favicon = $this->upload_file($request->file('favicon'), 'setting/favicon', 'images');
        }

        return $favicon;
    }
}
