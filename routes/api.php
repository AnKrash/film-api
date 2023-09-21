<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('films', FilmController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
Route::resource('genres', GenreController::class)->only(['index', 'show']);
Route::resource('rates', RateController::class)->only(['index', 'show', 'store', 'update', 'destroy']);



