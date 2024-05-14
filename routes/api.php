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
    Route::get('/', [StoreController::class, 'index'])->name('store.list');
    Route::get('/{store}', [StoreController::class, 'show'])->name('store.show');
    Route::post('/', [StoreController::class, 'store'])->name('store.create');
    Route::put('/{store}', [StoreController::class, 'update'])->name('store.update');
    Route::delete('/{store}', [StoreController::class, 'destroy'])->name('store.destroy');
    Route::get('/{store}/books', [StoreController::class, 'books'])->name('store.books');
});

// Book Routes
Route::middleware(['auth:sanctum'])->prefix('book')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('book.list');
    Route::get('/{book}', [BookController::class, 'show'])->name('book.show');
    Route::post('/', [BookController::class, 'store'])->name('book.create');
    Route::put('/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/{book}/stores', [BookController::class, 'stores'])->name('book.stores');
});
