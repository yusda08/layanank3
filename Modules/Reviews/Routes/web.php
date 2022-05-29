<?php

use Modules\Reviews\Http\Controllers\ArchiveController;
use Modules\Reviews\Http\Controllers\TestApplicationController;
use Modules\Reviews\Http\Controllers\VerificationController;

Route::middleware(['auth', 'check-user'])->group(function () {
    Route::prefix('reviews/test-application')->controller(TestApplicationController::class)->group(function () {
        Route::get('/', 'index')->name('reviews.test-application');
        Route::put('/verification/{form}', 'reviewForm');
        Route::post('/posting', 'posting')->name('reviews.posting');
        Route::get('/{form}', 'formVerification');
        Route::post('/officer-temp', 'storeOfficerTemp');
        Route::delete('/officer-temp/{temp}', 'deleteOfficerTemp');
    });

    Route::prefix('reviews/archive')->controller(ArchiveController::class)->group(function () {
        Route::get('/', 'index')->name('reviews.archive');
    });

    Route::prefix('reviews/verification')->controller(VerificationController::class)->group(function () {
        Route::get('/', 'index')->name('reviews.verification');
    });
});

