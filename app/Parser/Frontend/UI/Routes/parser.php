<?php

use App\Parser\Frontend\Controllers\Pages\ParserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'prefix' => 'parser',
    'as' => 'parser.'
], function () {
    Route::get('/new-parsing', [ParserController::class, 'newParsing'])->name('new-parsing');
    Route::get('/parsed-data', [ParserController::class, 'parsedData'])->name('parsed-data');
    Route::get('/parsed-data/{id}/edit', [ParserController::class, 'edit'])->name('parsed-data.edit');
    Route::patch('/parsed-data/{id}', [ParserController::class, 'update'])->name('parsed-data.update');
});
