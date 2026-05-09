<?php

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/verify-email', [VerifyEmailController::class, 'show'])->name('otp.show');
Route::post('/verify-otp', [VerifyEmailController::class, 'verify'])->name('otp.verify');
Route::post('/resend-otp', [VerifyEmailController::class, 'resend'])->name('otp.resend');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

// Admin Routes
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
    Route::post('/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle');
    Route::delete('/blogs/{id}', [AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');
});
