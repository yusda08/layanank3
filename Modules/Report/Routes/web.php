<?php

use Modules\Report\Http\Controllers\ArchiveAssignmentController;
use Modules\Report\Http\Controllers\LetterAgreementController;
use Modules\Report\Http\Controllers\LetterAssignmentController;

Route::middleware(['auth', 'check-user'])->group(function () {
    Route::prefix('report/letter-assignment')->controller(LetterAssignmentController::class)->group(function () {
        Route::get('/', 'index')->name('letter-assignment');
        Route::post('/', 'store');
        Route::post('/posting', 'posting');
        Route::get('/print-pdf/{form}', 'printPdf');
        Route::get('input/{form}', 'inputAssignment');
    });
    Route::prefix('report/letter-agreement')->controller(LetterAgreementController::class)->group(function () {
        Route::get('/', 'index')->name('letter-agreement');
        Route::post('/', 'store');
        Route::post('/posting', 'posting');
        Route::get('/print-pdf/{form}', 'printPdf');
        Route::get('input/{form}', 'inputAgreement');
    });

    Route::prefix('report/archive-assignment')->controller(ArchiveAssignmentController::class)->group(function () {
        Route::get('/', 'index')->name('archive-assignment');
    });

});

Route::prefix('report/archive-assignment')->controller(LetterAgreementController::class)->group(function () {
    Route::get('/print-pdf/{form}', 'printPdf');
});
