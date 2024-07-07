<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/unauthorized', [AuthController::class, 'unauthorize'])->name('unauthorized');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/trazer-dados', [AuthController::class, 'recoverAuthenticated'])->name('authenticated.user');
});

Route::prefix('usuarios')->group(function () {
    Route::post('/cadastrar', [UserController::class, 'store'])->name('user.store');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/listar-todos', [UserController::class, 'index'])->name('user.index');
        Route::put('/editar', [UserController::class, 'update'])->name('user.update');
        Route::get('/buscar/{id}', [UserController::class, 'show'])->name('user.show');
        Route::delete('/excluir-conta', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

Route::prefix('carros')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/listar-todos', [CarController::class, 'index'])->name('car.index');
        Route::post('/cadastrar', [CarController::class, 'store'])->name('car.store');
        Route::put('/editar/{id}', [CarController::class, 'update'])->name('car.update');
        Route::get('/buscar/{id}', [CarController::class, 'show'])->name('car.show');
        Route::delete('/remover', [CarController::class, 'destroy'])->name('car.destroy');
    });
});

