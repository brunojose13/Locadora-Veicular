<?php

declare(strict_types=1);

namespace App\Domain\Contracts\Ports\In;

use App\Domain\ValueObjects\Credentials;

interface IAuthService
{
    public function authenticate(Credentials $credentials): array;
    public function invalidate(): string;
    public function getAttributesFromLoggedAuth(): array;
    public function getDeauthorizeMessage(): void;
}
