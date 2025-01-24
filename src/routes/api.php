<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


// public routes
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');

// protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Route::get('tasks', [TaskController::class, 'index']);
    // Route::get('tasks/{task}', [TaskController::class, 'show']);
    // Route::post('tasks', [TaskController::class, 'store']);
    // Route::put('tasks/{task}', [TaskController::class, 'update']);
    // Route::delete('tasks/{task}', [TaskController::class, 'destroy']);
    Route::apiResource('tasks', TaskController::class);
});

