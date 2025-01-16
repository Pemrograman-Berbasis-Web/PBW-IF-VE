<?php

// Mengimpor PostController untuk digunakan dalam routing
use App\Http\Controllers\PostController;

// Mendefinisikan resource route untuk controller PostController
Route::resource('posts', PostController::class);
