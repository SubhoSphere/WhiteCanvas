<?php

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');

Route::get('/user/{username}', [BlogController::class, 'myBlog'])->name('blogs.my');

Route::get('/dashboard/my-posts', [BlogController::class, 'myPosts'])->name('dashboard.posts');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('legal.terms');
})->name('terms');
