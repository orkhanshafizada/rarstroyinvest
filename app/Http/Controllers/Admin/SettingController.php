<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the settings.
     *
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
     * Update the settings.
     *
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request): RedirectResponse
    {
        $this->authorize('settings.edit');

        $settings = $this->processSettings($request);

        foreach ($settings as $key => $value) {
            Setting::where('setting_key', $key)
                   ->update(['setting_value' => $value]);
        }

        return redirect()->route('admin.config')
                         ->with('message', __('Successfully updated.'))
                         ->with('message-alert', 'success');
    }

    /**
     * Process and upload setting files.
     *
     * @return array
     */
    private function processSettings(Request $request): array
    {
        $settings = array_map('htmlspecialchars', $request->all());

        $settings['logo_white'] = $this->handleFileUpload($request, 'logo_white');
        $settings['logo_colorful'] = $this->handleFileUpload($request, 'logo_colorful');
        $settings['logo_white_mobile'] = $this->handleFileUpload($request, 'logo_white_mobile');
        $settings['logo_colorful_mobile'] = $this->handleFileUpload($request, 'logo_colorful_mobile');
        $settings['favicon'] = $this->handleFileUpload($request, 'favicon');

        return $settings;
    }

    /**
     * Handle file upload and replace setting value.
     *
     * @param string $key
     * @return string
     */
    private function handleFileUpload(Request $request, string $key): string
    {
        $settingValue = setting($key);

        if ($request->hasFile($key)) {
            deleteDirectory($settingValue);
            $settingValue = $this->uploadFile($request->file($key), "setting/{$key}", 'images');
        }

        return $settingValue;
    }
}
