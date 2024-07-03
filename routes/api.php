<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/unauthorized', function () {
    return response()->json([
        'error' => 'Não autorizado! Você precisa estar logado para acessar o sistema'
    ], 401);
})->name('unauthorized');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::patch('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

