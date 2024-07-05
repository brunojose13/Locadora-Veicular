<?php

use App\Http\Controllers\AuthController;
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

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/usuario', [AuthController::class, 'recoverAuthenticated'])->name('authenticated.user');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/unauthorized', [AuthController::class, 'unauthorize'])->name('unauthorized');
