<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth:sanctum'])->prefix('user')->group(function () {
    Route::get('/', function (Request $request) {
        return $request->user();
    });
});

// Store Routes
Route::middleware(['auth:sanctum'])->prefix('store')->group(function () {
    Route::get('/', [StoreController::class, 'index']);
});

// Book Routes
Route::middleware(['auth:sanctum'])->prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index']);
});
