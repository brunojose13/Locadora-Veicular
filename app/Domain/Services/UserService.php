<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Infrastructure\Adapters\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {}

    public function verifyUser()
    {
        
    }
}
