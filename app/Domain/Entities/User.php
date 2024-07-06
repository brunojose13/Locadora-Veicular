<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Credentials;
use Illuminate\Support\Carbon;

class User
{
    public function __construct(
        private ?int $id,
        private string $name,
        private Credentials $credentials,
        private ?string $emailVerifiedAt,
        private ?string $rememberToken,
        private ?Carbon $createdAt,
        private ?Carbon $updatedAt
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCredentials(): Credentials
    {
        return $this->credentials;
    }

    public function getEmailVerifiedAt(): ?string
    {
        return $this->emailVerifiedAt;
    }

    public function getRememberToken(): ?string
    {
        return $this->rememberToken;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function toArray()
    {
        return array_merge([
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email_verified_at' => $this->getEmailVerifiedAt(),
            'remember_token' => $this->getRememberToken(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt()
        ], $this->getCredentials()->toArray());
    }
}
