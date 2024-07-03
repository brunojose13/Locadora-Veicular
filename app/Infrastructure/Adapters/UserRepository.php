<?php

namespace App\Infrastructure\Adapters;

use App\Infrastructure\Models\User;

class UserRepository
{
    function __construct(public User $model)
    {}
}
