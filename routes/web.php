<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public routes
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/show{id}', [PostController::class, 'show'])->name('posts.show');

// Guest routes (only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    // Register routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

    // Login routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Protected routes (only accessible when logged in)
Route::middleware('auth')->group(function () {
    Route::get('/post/new_post', [PostController::class, 'new_post'])->name('new_post');
    Route::post('/post/store', [PostController::class, 'store'])->name('create');
    
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/post/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
    
    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
