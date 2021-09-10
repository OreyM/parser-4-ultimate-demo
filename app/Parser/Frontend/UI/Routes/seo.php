<?php

use App\Parser\Frontend\Controllers\Pages\SeoController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {

    Route::get('/seo', [SeoController::class, 'index'])->name('seo');

    Route::group([
        'prefix' => 'seo',
        'as'     => 'seo.'
    ], function () {

    });
});
