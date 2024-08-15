<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SyncController extends Controller
{
    public function syncLetters()
    {
        Artisan::call('translation:sync-missing-translation-keys');
        return redirect()->back()->with('status', 'Translations synced successfully!');
    }
}

