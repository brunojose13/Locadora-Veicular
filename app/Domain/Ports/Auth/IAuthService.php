<?php

declare(strict_types=1);

namespace App\Domain\Ports\Auth;

use App\Domain\ValueObjects\Credentials;
use App\Infrastructure\Models\User;

interface IAuthService
{
    public function authenticate(Credentials $credentials): array;
    public function invalidate(): string;
    public function getAttributesFromLoggedAuth(): array;
    public function getDeauthorizeMessage(): string;
}
