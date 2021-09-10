<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'parser',
], function () {
    Route::group([
        'prefix' => 'test'
    ], function () {

    });
});
