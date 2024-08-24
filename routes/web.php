<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\HouseController;
use App\Http\Controllers\Front\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('locale/{locale?}', array('as' => 'set-locale', 'uses' => '\App\Http\Controllers\AppController@setlocale'))->name('locale');
Route::get('/slider/{slug}', [HomeController::class, 'show'])->name('slider.show');

Route::get('/o-nas', [AboutController::class, 'index'])->name('about.index');
Route::get('/voprosy-i-otvety', [FaqController::class, 'index'])->name('faq.index');
Route::get('/kontakty', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontakty', [ContactController::class, 'store'])->name('contact.store');

// News
Route::get('/novosti', [NewsController::class, 'index'])->name('news.index');
Route::get('/novosti/stranitsa/{current?}', [NewsController::class, 'index'])->name('news.index.page');
Route::get('/novosti/{slug}', [NewsController::class, 'show'])->name('news.show');

// Houses
Route::get('/doma', [HouseController::class, 'index'])->name('house.index');
Route::get('/doma/stranitsa/{current?}', [HouseController::class, 'index'])->name('house.index.page');
Route::get('/dom/{slug}', [HouseController::class, 'show'])->name('house.show');
Route::get('/doma/filtr', [HouseController::class, 'filter'])->name('house.filter');
