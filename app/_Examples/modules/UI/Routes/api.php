<?php

use Illuminate\Support\Facades\Route;

$apiType = 'backend';
$apiVersion = 'v1';

Route::group([
    'prefix' => $apiType . '/api/' . $apiVersion,
    'middleware' => 'CORS',
], function () {
    // ... some API routes
});
