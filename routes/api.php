<?php

use App\Http\Controllers\AuthController;
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

Route::post('/usuario/cadastrar', [UserController::class, 'store'])->name('store');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/trazer-dados', [AuthController::class, 'recoverAuthenticated'])->name('authenticated.user');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/listar-usuarios', [UserController::class, 'index'])->name('user.index');
    Route::put('/usuario/editar', [UserController::class, 'update'])->name('user.update');
    Route::get('/usuario/buscar/{id}', [UserController::class, 'show'])->name('user.show');
    Route::delete('/usuario/excluir-conta', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/unauthorized', [AuthController::class, 'unauthorize'])->name('unauthorized');
