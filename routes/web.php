<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

//home route
Route::get('/', [HomeController::class, 'index'])->name('home');

//admin guard route
Route::middleware(AdminMiddleware::class)
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        //admin dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //admin category routes
        Route::resource('categories', CategoryController::class)->except(['show']);
    });

//user login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//user register routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.form');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

//admin login routes
Route::get('/admin/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
