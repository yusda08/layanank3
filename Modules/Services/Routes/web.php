<?php

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

use Modules\Services\Http\Controllers\BodyDetailController;
use Modules\Services\Http\Controllers\HeadController;

Route::middleware(['auth'])->prefix('services')->group(function () {
    Route::prefix('head')->controller(HeadController::class)->group(function () {
        Route::get('/', 'index')->name('service.head');
        Route::post('/', 'store');
        Route::delete('/{serviceHead}', 'destroy');
    });
    Route::prefix('body-details')->controller(BodyDetailController::class)->group(function () {
        Route::get('/', 'index')->name('service.body');
        Route::post('/', 'storeBody');
        Route::delete('/{serviceBody}', 'destroyBody');
        //Details
//        Route::post('/', 'storeDetail')->name('service.detail');
//        Route::delete('/{serviceBody}', 'destroyDetail')->name('service.detail');
    });
});
