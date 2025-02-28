<?php

use App\Http\Controllers\api\AdminAuthController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//register route 
Route::post('/register', [AuthController::class, 'register']);


//login route
Route::post('/login', [AuthController::class, 'login']);

//logout route
Route::post('/logout', [AuthController::class, 'logout']);

//admin login route
Route::post('/admin/login', [AdminAuthController::class, 'login']);

//admin middleware  by token base sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    });
    