<?php

use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\PageSectionController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('lara-landing.admin_routes_prefix'))->name('lara-landing.')->middleware(config('lara-landing.admin_routes_middlewars'))->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
    Route::get('/create', [LandingPageController::class, 'create'])->name('landing.create');
    Route::post('/create', [LandingPageController::class, 'store'])->name('landing.store');
    Route::get('/{landingPage}/edit', [LandingPageController::class, 'edit'])->name('landing.edit');
    Route::put('/{landingPage}/edit', [LandingPageController::class, 'update'])->name('landing.update');
    Route::delete('/{landingPage}', [LandingPageController::class, 'destroy'])->name('landing.delete');

    Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload-image');

    // landing page sections
    Route::get('/{landingPage}/sections', [PageSectionController::class, 'index'])->name('landing.sections');
    Route::get('/{landingPage}/sections/create', [PageSectionController::class, 'create'])->name('landing.sections.create');
    Route::post('/{landingPage}/sections/create', [PageSectionController::class, 'store'])->name('landing.sections.store');
    Route::post('/{landingPage}/sections/update-sections-order', [PageSectionController::class, 'update_sections_order'])->name('landing.sections.re-order');
    Route::get('/{landingPage}/sections/{section}/edit', [PageSectionController::class, 'edit'])->name('landing.sections.edit');
    Route::put('/{landingPage}/sections/{section}/edit', [PageSectionController::class, 'update'])->name('landing.sections.update');
    Route::get('/{landingPage}/sections/{section}/delete', [PageSectionController::class, 'destroy'])->name('landing.sections.delete');
});
