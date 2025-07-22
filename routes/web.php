<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'loginPage'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.submit');

    Route::get('/signup', [UserController::class, 'signupPage'])->name('register');
    Route::post('/signup', [UserController::class, 'signup'])->name('register.submit');
});

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/create-ticket', [UserController::class, 'createTicketPage'])->name('user.create-ticket');
    Route::post('/create-ticket', [UserController::class, 'createTicket'])->name('user.create-ticket');
    Route::get('/view-tickets', [UserController::class, 'viewTickets'])->name('user.view-tickets');

    // Admin routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users.index');
        Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets.index');
        Route::get('/queries', [AdminController::class, 'queries'])->name('queries.index');
        Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts.index');
    });

    // Superadmin routes
    Route::middleware('superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
        Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('dashboard');
    });
});
