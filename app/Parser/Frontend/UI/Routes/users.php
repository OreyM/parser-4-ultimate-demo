<?php

use App\Parser\Frontend\Controllers\Pages\UsersController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {
    Route::group([
        'prefix' => 'users',
        'as'     => 'users.'
    ], function () {
        Route::get('/all', [UsersController::class, 'index'])->name('all');
        Route::get('/add', [UsersController::class, 'create'])->name('add');
        Route::get('/banned', [UsersController::class, 'banned'])->name('banned');
    });
});
