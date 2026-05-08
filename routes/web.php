<?php

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');
