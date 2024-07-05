<?php

namespace App\Domain\Services;

use App\Domain\Ports\Auth\IAuthService;
use App\Domain\ValueObjects\Credentials;
use App\Infrastructure\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthService implements IAuthService
{
    public function authenticate(Credentials $credentials): array
    {
        if (! Auth::attempt($credentials->toArray())) {
            throw new AuthenticationException(
                'O e-mail ou a senha estão inválidos'
            );
        }

         /** @var User $user */
         $user = Auth::user();
         $minutesExpiration = 10;
 
         $token = $user->createToken(
             'Token for user ID: ' . $user->id,
             ['*'],
             now()->addMinutes($minutesExpiration)
         )->plainTextToken;

        return [
            'message' => 'Login realizado com sucesso!',
            'token' => $token,
            'expire in' => $minutesExpiration . ' minutes'
        ];
    }

    public function invalidate(User $user): string
    {
        $user->tokens()->delete();

        return 'Usuário deslogado com sucesso!';
    }

    public function getAttributesFromLoggedAuth(User $user): array
    {
        return [
           'user' => $user->toArray()
        ];
    }


    public function getDeauthorizeMessage(): string
    {
        return 'Não autorizado! Você precisa estar logado para poder acessar o sistema';
    }
}
