<?php

use App\Parser\ParsedData\Controller\Api\V1\AllDataController;
use App\Parser\ParsedData\Controller\Api\V1\CheckProblemsController;

$apiType = 'data';
$apiVersion = 'v1';

Route::group([
    'middleware' => 'web',
    'prefix' => $apiType . '/api/' . $apiVersion,
    'as' => 'api.' . $apiType . '.',
], function () {

    Route::get('/all', AllDataController::class)->name('all');
    Route::get('/check-problem', CheckProblemsController::class)->name('check-problem');
});
