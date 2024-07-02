<?php

namespace App\Domain\Entities;

use Carbon\Carbon;
use JsonSerializable;

class CustomerEntity extends PersonEntity implements JsonSerializable
{
    private int|null $id;
    private Carbon $birthDate;
    private int $licenceTime;

    public function __construct(
        ?int $id,
        string $name,
        ?string $lastName,
        string $cpf,
        string $email,
        string $phoneNumber,
        Carbon $birthDate,
        int $licenceTime
    ) {
        parent::__construct($name, $lastName, $cpf, $email, $phoneNumber);

        $this->id = $id;
        $this->birthDate = $birthDate;
        $this->licenceTime = $licenceTime;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $newId): void
    {
        if ($newId !== null && $newId < 0) {
            throw new \Exception('o id não pode ser negativo');
        }

        $this->id = $newId;
    }

    public function getBirthDate(): Carbon
    {
        return $this->birthDate;
    }

    public function getLicenceTime(): int
    {
        return $this->licenceTime;
    }

    public function hasId(): bool
    {
        return ! empty($this->id);
    }

    public function jsonSerialize(): mixed
    {
        $properties = [
            'first_name' => $this->getName(),
            'last_name' => $this->getLastName(),
            'cpf' => $this->getCpf(),
            'email' => $this->getEmail(),
            'phone_number' => $this->getPhoneNumber(),
            'date_of_birth' => $this->getBirthDate()->toDate(),
            'license_time' => $this->getLicenceTime()
        ];

        if ($this->hasId()) {
            $properties = array_merge([
                'id' => $this->getId()
            ], $properties);
        }

        return $properties;
    }
}
