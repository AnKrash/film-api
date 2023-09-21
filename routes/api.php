<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::put('/films/{id}', [FilmController::class, 'update']);
Route::resource('films', FilmController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('genres', GenreController::class)->only(['index', 'show']);
Route::resource('rates', RateController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

// Фильмы
//Route::get('/films', [FilmController::class, 'index']);
//Route::get('/films/{id}', [FilmController::class, 'show']);
//
//// Жанры
//Route::get('/genres', [GenreController::class, 'index']);
//Route::get('/genres/{id}', [GenreController::class, 'show']);
//
//// Рейтинги
//Route::get('/rates', [RateController::class, 'index']);
//Route::post('/rates', [RateController::class, 'store']);
//Route::get('/rates/{id}', [RateController::class, 'show']);
//Route::put('/rates/{id}', [RateController::class, 'update']);
//Route::delete('/rates/{id}', [RateController::class, 'destroy']);




//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::resource('genres', GenreController::class)->only(['index', 'show']);
//// Сначала определите маршруты для CRUD операций с фильмами
//Route::get('films', [FilmController::class, 'index']);
//Route::get('films/create', [FilmController::class, 'create']);
////Route::post('films', [FilmController::class, 'store']);
////Route::post('films/rate/{film}', [FilmController::class, 'rate']);
//Route::post('films/{film}/rate', [FilmController::class, 'rate']);
//
//
//Route::get('films/{film}', [FilmController::class, 'show']);
//Route::get('films/{film}/edit', [FilmController::class, 'edit']);
//Route::put('films/{film}', [FilmController::class, 'update']);
//Route::delete('films/{film}', [FilmController::class, 'destroy']);
//
//// Затем определите маршруты для других функций, такие как поиск и рейтинг
//Route::resource('films', FilmController::class);
//Route::get('films/search', [FilmController::class, 'search']);
//Route::post('films/upload-cover/{film}', [FilmController::class, 'uploadCover']);
//
//
//Route::resource('rates', RateController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
//// routes/api.php
//Route::resource('films', FilmController::class);
//Route::post('films/upload-cover/{film}', [FilmController::class, 'uploadCover']);
//Route::post('films/rate/{film}', [FilmController::class, 'rate']);
//Route::get('films/search', [FilmController::class, 'search']);


