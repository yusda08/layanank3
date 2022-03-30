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

use Modules\Referensi\Http\Controllers\RefCityController;
use Modules\Referensi\Http\Controllers\RefDistrictController;

Route::prefix('referensi/city')->group(function () {
    Route::controller(RefCityController::class)->group(function () {
        Route::get('load-city/{prov_id}', 'loadCities');
    });
});

Route::prefix('referensi/district')->group(function () {
    Route::controller(RefDistrictController::class)->group(function () {
        Route::get('load-district/{city_id}', 'loadDistricts');
    });
});