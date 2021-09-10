<?php

use App\Parser\Frontend\Controllers\Pages\GamesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {
    Route::get('/games', [GamesController::class, 'index'])->name('games');
});
