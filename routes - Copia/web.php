<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Force all visitors to login first
Route::redirect('/', '/login');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Course Route (if it needs to be accessible without auth)
Route::get('/layouts/html_curso', function(){
    return view('layouts.curso1');
})->name('curso1.html');

// Protected Routes (require authentication)
Route::middleware('auth')->group(function () {
    // Main Home Page
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Admin Routes (require admin privileges)
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Add other admin routes here
    });

    // Add other protected routes below
    // Example:
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// If you want the course route to be protected, move it inside the auth group:
// Route::middleware('auth')->group(function () {
//     Route::get('/layouts/html_curso', function(){
//         return view('layouts.curso1');
//     })->name('curso1.html');
// });