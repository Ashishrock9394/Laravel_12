<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsSuperadmin;   

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'loginPage'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.submit');

    Route::get('/signup', [UserController::class, 'signupPage'])->name('register');
    Route::post('/signup', [UserController::class, 'signup'])->name('register.submit');
});

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');
    
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users.index');
        Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets.index');
        Route::get('/queries', [AdminController::class, 'queries'])->name('queries.index');
        Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts.index');
    });


    Route::middleware('superadmin')->group(function () {
        Route::get('/superadmin/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
    });
});
