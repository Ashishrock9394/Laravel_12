<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\NotificationController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [HomeController::class, 'loginPage'])->name('login');
    Route::get('/signup', [HomeController::class, 'signupPage'])->name('register');
    // Login and Signup Form Submission
    Route::post('/login', [UserController::class, 'login'])->name('login.submit');
    Route::post('/signup', [UserController::class, 'signup'])->name('register.submit');
});

// Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // user routes 
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/contactForm',[UserController::class, 'contactStore'])->name('contact.store');
    Route::get('/create-ticket', [UserController::class, 'createTicketPage'])->name('user.create-ticket');
    Route::post('/create-ticket', [UserController::class, 'createTicket'])->name('user.create-ticket');
    Route::get('/view-tickets', [UserController::class, 'viewTickets'])->name('user.view-tickets');
    Route::get('/notifications/fetch', [NotificationController::class, 'fetch'])->name('notifications.fetch');
    Route::get('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications/read/{id}', [NotificationController::class, 'markSingleAsRead'])->name('notifications.read');


    // Attendance and Leave Routes
    Route::get('/create-leave', [UserController::class, 'createLeavePage'])->name('user.create-leave');
    Route::post('/create-leave', [UserController::class, 'createLeave'])->name('user.create-leave');
    Route::get('/view-leaves', [UserController::class, 'viewLeaves'])->name('user.view-leaves');


    // Admin routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users.index');
        Route::get('/tickets', [AdminController::class, 'tickets'])->name('tickets.index');
        Route::get('/queries', [AdminController::class, 'queries'])->name('queries.index');
        Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts.index');
        Route::get('/leave-requests', [AdminController::class, 'leaveRequests'])->name('leave-requests.index');
    });

    // Superadmin routes
    Route::middleware('superadmin')->prefix('superadmin')->name('superadmin.')->group(function () {
        Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('dashboard');
    });
});
