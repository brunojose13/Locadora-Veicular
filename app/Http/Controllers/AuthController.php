<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Infrastructure\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as Status;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'O e-mail ou a senha estão inválidos'
            ], Status::HTTP_UNAUTHORIZED);
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
            'expire in' => $minutesExpiration . ' minutes'
        ], Status::HTTP_ACCEPTED);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Usuário deslogado com sucesso!'
        ], Status::HTTP_OK);
    }

    public function recoverAuthenticated(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $request->user()->toArray()
        ], Status::HTTP_OK);
    }

    public function unauthorize(): JsonResponse
    {
        return response()->json([
            'error' => 'Não autorizado! Você precisa estar logado para poder acessar o sistema'
        ], Status::HTTP_UNAUTHORIZED);
    }
}
