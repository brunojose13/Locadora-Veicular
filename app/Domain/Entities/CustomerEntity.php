<?php

namespace App\Domain\Entities;

use Carbon\Carbon;
use JsonSerializable;

class CustomerEntity implements JsonSerializable
{
    public function __construct(
        private string $name,
        private ?string $lastName,
        private string $cpf,
        private string $email,
        private string $phoneNumber,
        private Carbon $birthDate,
        private int $licenceTime
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

    public function getBirthDate(): Carbon
    {
        return $this->birthDate;
    }

    public function getLicenceTime(): int
    {
        return $this->licenceTime;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'first_name' => $this->getName(),
            'last_name' => $this->getLastName(),
            'cpf' => $this->getCpf(),
            'email' => $this->getEmail(),
            'phone_number' => $this->getPhoneNumber(),
            'date_of_birth' => $this->getBirthDate(),
            'license_time' => $this->getLicenceTime()
        ];
    }
}
