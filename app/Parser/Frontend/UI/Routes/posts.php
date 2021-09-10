<?php

use App\Parser\Frontend\Controllers\Pages\InstructionsController;
use App\Parser\Frontend\Controllers\Pages\NewsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {

    Route::group([
        'prefix' => 'news',
        'as'     => 'news.'
    ], function () {
        Route::get('/', [NewsController::class, 'index'])->name('all');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
    });

    Route::group([
        'prefix' => 'instructions',
        'as'     => 'instructions.'
    ], function () {
        Route::get('/', [InstructionsController::class, 'index'])->name('all');
        Route::get('/create', [InstructionsController::class, 'create'])->name('create');
    });

});
