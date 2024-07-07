<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use Illuminate\Support\Facades\Hash;

class Credentials
{
    // private string $hashedPassword;

    public function __construct(private string $email, private string $password)
    {
        // $this->hashedPassword = Hash::make($this->getPassword());
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    // public function getHashedPassword(): string
    // {
    //     return $this->hashedPassword;
    // }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }

    public function toDatabase(): array
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }
}
