<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class UserData
{
    public function __construct(private string $name, private Credentials $credentials)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCredentials(): Credentials
    {
        return $this->credentials;
    }

    public function getEmail(): string
    {
        return $this->getCredentials()->getEmail();
    }

    public function toDatabase(): array
    {
        return array_merge([
            'name' => $this->getName(),    
        ], $this->getCredentials()->toDatabase());
    }
}
