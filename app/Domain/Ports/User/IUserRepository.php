<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\Entities\User;
use App\Domain\ValueObjects\UserDataForUpdate;

interface IUserRepository
{
    public function save(User $user): bool;
    public function update(UserDataForUpdate $data): bool;
    public function getByEmail(string $email): ?User;
    public function delete(string $email): bool;
}
