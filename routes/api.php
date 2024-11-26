<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieSeriesController;
use App\Http\Controllers\CharacterController;

Route::prefix('movies-series')->group(function () {
    Route::get('/', [MovieSeriesController::class, 'index']); // List all movies/series
    Route::post('/', [MovieSeriesController::class, 'store']); // Create a new movie/series
    Route::get('/{id}', [MovieSeriesController::class, 'show']); // Show a specific movie/series
    Route::put('/{id}', [MovieSeriesController::class, 'update']); // Update a movie/series
    Route::delete('/{id}', [MovieSeriesController::class, 'destroy']); // Delete a movie/series
});

Route::prefix('characters')->group(function () {
    Route::get('/', [CharacterController::class, 'index']); // List all characters
    Route::post('/', [CharacterController::class, 'store']); // Create a new character
    Route::get('/{id}', [CharacterController::class, 'show']); // Show a specific character
    Route::put('/{id}', [CharacterController::class, 'update']); // Update a character
    Route::delete('/{id}', [CharacterController::class, 'destroy']); // Delete a character
});
