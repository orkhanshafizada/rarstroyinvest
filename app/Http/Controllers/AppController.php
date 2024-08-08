<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    /**
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setlocale($locale='en')
    {
        if (!in_array($locale, config('app.supported_locales'))) {
            $locale = 'ru';
        }
        app()->setLocale($locale);
        Session::put("locale",$locale);
        return redirect()->back();
    }
}
