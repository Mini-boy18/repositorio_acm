<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;

<<<<<<< Updated upstream
// Force redirect to login
Route::redirect('/', '/login');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Admin Routes
=======
// Redirecionamento raiz
Route::redirect('/', '/entrar');

// Rotas de autenticação
Route::middleware('guest')->group(function () {
    Route::get('/entrar', [AuthController::class, 'mostrarFormularioLogin'])->name('entrar');
    Route::post('/entrar', [AuthController::class, 'login']);
    Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])->name('registro');
    Route::post('/registro', [AuthController::class, 'registro']);
});

Route::post('/sair', [AuthController::class, 'logout'])->name('sair');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');
    
    // Rotas de administração
>>>>>>> Stashed changes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/painel', [DashboardController::class, 'index'])->name('admin.painel');
    });
});