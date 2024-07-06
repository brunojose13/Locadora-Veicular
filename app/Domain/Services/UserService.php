<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Entities\User;
use App\Domain\Ports\User\IUserRepository;
use App\Domain\ValueObjects\UserDataForUpdate;

class UserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function createUser(User $user): bool
    {
        try {
            return $this->userRepository->save($user);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateUser(UserDataForUpdate $data): bool
    {
        try {
            return $this->userRepository->update($data);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUserByEmail(string $email): ?User
    {
        try {
            return $this->userRepository->getByEmail($email);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function deleteUser(string $email): bool
    {
        try {
            return $this->userRepository->delete($email);
        } catch (\Exception $e) {
            return false;
        }
    }
}
