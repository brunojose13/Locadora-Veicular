<?php

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
