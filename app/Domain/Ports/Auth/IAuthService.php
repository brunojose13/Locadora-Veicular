<?php

namespace App\Domain\Ports\Auth;

use App\Domain\ValueObjects\Credentials;
use App\Infrastructure\Models\User;

interface IAuthService
{
    public function authenticate(Credentials $credentials): array;
    public function invalidate(User $user): string;
    public function getDeauthorizeMessage(): string;
}
