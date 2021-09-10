<?php

use App\Parser\Frontend\Controllers\Pages\CommentsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'playone-club',
    'as'     => 'playone-club.'
], function () {

    Route::get('/comments', [CommentsController::class, 'index'])->name('comments');

    Route::group([
        'prefix' => 'comments',
        'as'     => 'comments.'
    ], function () {

    });
});
