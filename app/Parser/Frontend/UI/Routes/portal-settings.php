<?php

use App\Parser\Frontend\Controllers\Pages\PortalSettings\SecurityController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {

    Route::group([
        'prefix' => 'settings',
        'as'     => 'settings.'
    ], function () {
        Route::get('/security', [SecurityController::class, 'index'])->name('security');
    });
});
