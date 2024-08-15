<?php

use App\Http\Controllers\Admin\AboutUs\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\CkEditorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\Faq\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\House\Equipment\EquipmentController;
use App\Http\Controllers\Admin\House\Filter\FilterController;
use App\Http\Controllers\Admin\House\House\HouseController;
use App\Http\Controllers\Admin\House\Mortgage\MortgageController;
use App\Http\Controllers\Admin\House\Structure\StructureController;
use App\Http\Controllers\Admin\Moderator\ModeratorController;
use App\Http\Controllers\Admin\Moderator\PermissionController;
use App\Http\Controllers\Admin\Moderator\RoleController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Staff\StaffController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\SyncController;
use Illuminate\Support\Facades\Route;

Route::prefix('jarvis')->name('admin.')->group(function()
{

    Route::middleware('guest')->group(function()
    {
        Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('postLogin');
    });

    Route::middleware('admin')->group(function()
    {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        //Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('config');
        Route::post('/settings', [SettingController::class, 'update']);

        //User roles
        Route::resource('/moderator', ModeratorController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/permission', PermissionController::class);

        //Slider
        Route::resource('/slider', SliderController::class);
        Route::get('/sliders/main/{slider}', [SliderController::class, 'mainSlide'])->name('slider.main');

        //About
        Route::resource('/about', AboutUsController::class);

        //Contact Us
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('contact.show');

        //Gallery
        Route::get('/gallery/{category_id}/{type}/{image_type}', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/gallery/json/{category_id}/{type}/{image_type}', [GalleryController::class, 'indexJson'])->name('gallery.indexJson');
        Route::post('/gallery/store/{category_id}/{type}/{image_type}', [GalleryController::class, 'store'])->name('gallery.store');
        Route::post('/gallery/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        //Faqs
        Route::resource('/faq', FaqController::class);

        //News
        Route::resource('/news', NewsController::class);

        //Staff
        Route::resource('/staff', StaffController::class);

        //News
        Route::resource('/comment', CommentController::class);

        //Partner
        Route::resource('/partner', PartnerController::class);


        /////////////////////HOUSE PARAMETERS/////////////////////
        Route::resource('/mortgage', MortgageController::class);
        Route::resource('/structure', StructureController::class);
        Route::resource('/filter', FilterController::class);

        //House settings
        Route::resource('/house', HouseController::class);

        Route::resource('/equipment', EquipmentController::class);
        Route::get('/houses/equipment/{house_id}', [EquipmentController::class, 'index'])->name('equipment.index');
        Route::get('/equipment/create/{house_id}', [EquipmentController::class, 'create'])->name('equipment.create');

        /////////////////////HOUSE PARAMETERS END/////////////////////




        //CK Editor
        Route::post('/ckeditor', [CkEditorController::class, 'store'])->name('ckeditor.store');

        // routes/web.php
        Route::get('sync-letters', [SyncController::class, 'syncLetters'])
             ->name('sync-letters');
    });
});



