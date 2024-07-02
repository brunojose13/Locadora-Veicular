<?php

namespace App\Domain\Entities;

use Carbon\Carbon;

class PersonEntity
{
    public function __construct(
        private string $name,
        private ?string $lastName,
        private string $cpf,
        private string $email,
        private string $phoneNumber
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
