<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Rute utama
Route::get('/', [PostController::class, 'index']);

// Resource route untuk PostController
Route::resource('posts', PostController::class);
Route::get('/check-env', function () {
    return env('APP_KEY', 'No APP_KEY found');
});
