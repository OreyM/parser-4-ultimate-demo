<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => '',
], function () {

    Route::get('/', function () {
        return redirect('dashboard');
    })->name('home');

    Route::get('/empty')->name('empty'); // For empty url
});
