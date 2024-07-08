<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Ports\In\IAuthService;
use App\Domain\ValueObjects\Credentials;
use App\Exceptions\CredentialsException;
use App\Exceptions\UnauthorizedUserException;
use App\Infrastructure\Models\User;

class AuthService implements IAuthService
{
    public function authenticate(Credentials $credentials): array
    {
        if (! auth()->attempt($credentials->toArray())) {
            throw new CredentialsException();
        }

         /** @var User $user */
         $user = auth()->user();
         $minutesExpiration = config('auth.token_expiration_minutes', 10);
 
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

    public function invalidate(): string
    {
        /** @var User $user */
        $user = auth()->user();
        $user->tokens()->delete();

        return 'Usuário deslogado com sucesso!';
    }

    public function getAttributesFromLoggedAuth(): array
    {
        /** @var User $user */
        $user = auth()->user();

        return [
           'user' => $user->toArray()
        ];
    }

    public function getDeauthorizeMessage(): void
    {
        throw new UnauthorizedUserException();
    }
}
