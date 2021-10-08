<?php

use App\Parser\Core\Controllers\Api\GetGamesByIDsController;
use App\Parser\Core\Controllers\Api\V1\Parser\ChangePropertiesController;
use App\Parser\Core\Controllers\Api\V1\Parser\FinishParsingController;
use App\Parser\Core\Controllers\Api\V1\Parser\GetGamesIDController;
use App\Parser\Core\Controllers\Api\V1\Parser\GetSavedGamesIDController;
use App\Parser\Core\Controllers\Api\V1\Parser\ParserInitialDataController;
use App\Parser\Core\Controllers\Api\V1\Parser\StartParsingController;
use App\Parser\Core\Controllers\Api\V1\Parser\StoreNewGamesController;
use App\Parser\Core\Controllers\Api\V1\Parser\UpdateOldGamesController;
use Illuminate\Support\Facades\Route;

$apiType = 'parser';
$apiVersion = 'v1';

Route::group([
    'middleware' => 'web',
    'prefix' => $apiType . '/api/' . $apiVersion,
    'as' => 'api.parser.'
], function () {
    Route::get('/init', ParserInitialDataController::class)->name('init');
    Route::get('/start', StartParsingController::class)->name('start');
    Route::post('/finish', FinishParsingController::class)->name('finish');
    Route::post('/games-id-ru', GetGamesIDController::class)->name('games-id-ru');
    Route::post('/games-id-ar', GetGamesIDController::class)->name('games-id-ar');
    Route::get('/change-properties', ChangePropertiesController::class)->name('change-properties');
    Route::get('/saved-games', GetSavedGamesIDController::class)->name('saved-games');
    Route::post('/store-new-games', StoreNewGamesController::class)->name('store-new-games');
    Route::post('/update-old-games', UpdateOldGamesController::class)->name('update-old-games');
});
