<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('books', BookController::class);
    
    Route::apiResource('chapters', ChapterController::class);
    Route::get('chapters/findByBookId/{id}', 'ChapterController@getByBookId');
});
