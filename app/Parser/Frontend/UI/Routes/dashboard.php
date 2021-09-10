<?php

use App\Parser\Frontend\Controllers\Pages\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => '',
    'as'     => ''
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
