<?php

use App\Parser\Frontend\Controllers\Pages\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');
});
