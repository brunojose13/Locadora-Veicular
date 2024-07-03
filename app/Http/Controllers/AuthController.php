<?php

namespace App\Http\Controllers;

use App\Http\Enums\HttpStatus;
use App\Http\Requests\LoginRequest;
use App\Infrastructure\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function login(LoginRequest $request)
    // {
    //     dd($request->validated());
    // }

    // public function login(LoginRequest $request)
    // {
    //     $credentials = $request->validated();

    //     if (! Auth::attempt($credentials)) {
    //         return response()->json([
    //             'message' => 'O e-mail ou a senha estão inválidos'
    //         ], HttpStatus::UNAUTHORIZED);
    //     }

    //     /** @var User $user */
    //     $user = Auth::user();

    //     $minutesExpiration = 10;

    //     $token = $user->createToken(
    //         'Token for user ID: ' . $user->id,
    //         ['*'],
    //         now()->addMinutes($minutesExpiration)
    //     )->plainTextToken;

    //     return response()->json([
    //         'message' => 'Login realizado com sucesso!',
    //         'token' => $token,
    //         'expire in' => $minutesExpiration
    //     ], HttpStatus::ACCEPTED);
    // }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'O e-mail ou a senha estão inválidos'
            ], HttpStatus::UNAUTHORIZED);
        }

        /** @var User $user */
        $user = Auth::user();

        $minutesExpiration = 10;

        $token = $user->createToken(
            'Token for user ID: ' . $user->id,
            ['*'],
            now()->addMinutes($minutesExpiration)
        )->plainTextToken;

        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'token' => $token,
            'expire in' => $minutesExpiration
        ], HttpStatus::ACCEPTED);
    }
}
