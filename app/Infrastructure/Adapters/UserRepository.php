<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapters;

use App\Domain\Entities\User as UserEntity;
use App\Domain\Ports\User\IUserRepository;
use App\Domain\ValueObjects\Credentials;
use App\Domain\ValueObjects\UserDataForUpdate;
use App\Infrastructure\Models\User;

class UserRepository implements IUserRepository
{
    private static function getModel(): User
    {
        return new User();
    }
    public function save(UserEntity $user): bool
    {
        self::getModel()->create($user->toArray());
        
        return true;
    }

    public function update(UserDataForUpdate $data): bool
    {
        $user = self::getModel()->where('email', $data->getCredentials()->getEmail())->first();

        if (! $user) return false;
        
        $user->update($data->toArray());

        return true;
    }

    public function getByEmail(string $email): ?UserEntity
    {
        $user = self::getModel()->where('email', $email)->first();

        if (! $user) return null;
        
        return new UserEntity(
            $user->id ,
            $user->name,
            new Credentials($user->email, $user->password),
            $user->email_verified_at,
            $user->remember_token,
            $user->created_at,
            $user->updated_at
        );
    }

    public function delete(string $email): bool
    {
        $user = self::getModel()->where('email', $email)->first();

        if (! $user) return false;
        
        $user->delete();

        return true;
    }
}
