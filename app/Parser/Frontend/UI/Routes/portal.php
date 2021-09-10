<?php

use App\Parser\Frontend\Controllers\Pages\CommentsController;
use App\Parser\Frontend\Controllers\Pages\Portal\DocumentsController;
use App\Parser\Frontend\Controllers\Pages\Portal\FrontPageController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {

    Route::get('/portal', [CommentsController::class, 'index'])->name('portal');

    Route::group([
        'prefix' => 'portal',
        'as'     => 'portal.'
    ], function () {
        Route::get('/front-page', [FrontPageController::class, 'index'])->name('front-page');
        Route::get('/documents', [DocumentsController::class, 'index'])->name('documents');
    });
});
