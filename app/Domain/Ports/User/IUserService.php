<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\ValueObjects\UserData;

interface IUserService
{
    public function getUsers(): UserListOutput;
    public function createUser(UserData $userData): UserOutput;
    public function updateUser(UserData $userData): UserOutput;
    public function getUserById(int $id): UserOutput;
    public function deleteUser(int $id): DeletedUserOutput;
}
