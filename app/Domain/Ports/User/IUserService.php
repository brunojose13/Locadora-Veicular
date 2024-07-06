<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\UserDataForUpdate;

interface IUserService
{
    public function createUser(User $user): string;
    public function updateUser(UserDataForUpdate $data): string;
    public function getUserByEmail(string $email): array;
    public function deleteUser(string $email): string;
}
