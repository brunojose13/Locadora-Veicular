<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Entities\User;
use App\Domain\Ports\User\IUserRepository;
use App\Domain\Ports\User\IUserService;
use App\Domain\ValueObjects\UserDataForUpdate;

class UserService implements IUserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function createUser(User $user): string
    {
        try {
            $this->userRepository->save($user);

            return '';
        } catch (\Exception $e) {
            return '';
        }
    }

    public function updateUser(UserDataForUpdate $data): string
    {
        try {
            $this->userRepository->update($data);

            return '';
        } catch (\Exception $e) {
            return '';
        }
    }

    public function getUserByEmail(string $email): array
    {
        try {
            $this->userRepository->getByEmail($email);
            return [];

        } catch (\Exception $e) {
            return [];
        }
    }

    public function deleteUser(string $email): string
    {
        try {
            $this->userRepository->delete($email);

            return '';
        } catch (\Exception $e) {
            return '';
        }
    }
}
