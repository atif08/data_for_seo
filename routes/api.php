<?php

use App\Http\Controllers\KeywordController;
use App\Http\Controllers\SearchKeywordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/post-back', [KeywordController::class, 'saveKeywordResult']);
Route::post('/search', SearchKeywordController::class);
Route::get('/searches', \App\Http\Controllers\SearchIndexController::class);
Route::get('/searches/{id}', \App\Http\Controllers\SearchGraphShowController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
