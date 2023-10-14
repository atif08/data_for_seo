<?php

use App\Http\Controllers\KeywordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', SearchIndexController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/keywords', [KeywordController::class, 'index']);
Route::post('/post-back', [KeywordController::class, 'saveKeywordResult']);

Route::middleware('auth')->group(function () {

    Route::get('/searches', SearchIndexController::class);
    Route::get('/searches/{id}', \App\Http\Controllers\SearchGraphShowController::class)->name('searches.detail');
    Route::post('/post-back', [KeywordController::class, 'saveKeywordResult']);
    Route::post('/search', \App\Http\Controllers\SearchKeywordController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
