<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\Media\NewsController;
use App\Http\Controllers\Front\Social\FaqController;
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

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');


//News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/page/{current?}', [NewsController::class, 'index'])->name('news.index.page');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
