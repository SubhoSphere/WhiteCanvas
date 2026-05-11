<?php

use App\Http\Controllers\BlogController;

Route::get('/', [BlogController::class, 'home']);

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');

Route::get('/verify-email', [VerifyEmailController::class, 'show'])->name('otp.show');
Route::post('/verify-otp', [VerifyEmailController::class, 'verify'])->name('otp.verify')->middleware('throttle:10,1');
Route::post('/resend-otp', [VerifyEmailController::class, 'resend'])->name('otp.resend')->middleware('throttle:3,1');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:10,1');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/blogs/filter', [BlogController::class, 'filter'])->name('blogs.filter');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/my-blogs', [BlogController::class, 'myPosts'])->name('dashboard.blogs');
});

Route::get('/user/{username}', [BlogController::class, 'myBlog'])->name('blogs.my');

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
use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Shared Blog Management (Authorization handled in AdminController)
    Route::get('/blogs', [AdminController::class, 'index'])->name('admin.blogs');
    Route::get('/blogs/create', [AdminController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [AdminController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [AdminController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{blog}', [AdminController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}', [AdminController::class, 'destroy'])->name('admin.blogs.delete');

    // Strictly Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle');
    });
});
