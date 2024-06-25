<?php

use App\Http\Controllers\CustomerController;
use App\Http\Middleware\EnsureIsValidSeller;
use App\Models\Customer;
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

Route::middleware(EnsureIsValidSeller::class)->group(function () {
    Route::prefix('clientes')->group(function () {
        Route::get('/buscar/{id?}', [CustomerController::class, 'index'])
            ->name('buscar-cliente');

        Route::post('/cadastrar', [CustomerController::class, 'store'])
            ->name('cadastrar-cliente');

        Route::patch('/atualizar-habilitação/{id}', [CustomerController::class, 'update'])
            ->name('atualizar-habilitacao');

        Route::delete('/excluir/{id}', [CustomerController::class, 'delete'])
            ->name('excluir-cliente');
    });
});