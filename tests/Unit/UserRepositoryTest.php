<?php

use App\Domain\Entities\User as UserEntity;
use App\Domain\Ports\User\IUserRepository;
use App\Domain\ValueObjects\Credentials;
use App\Infrastructure\Models\User;

beforeEach(function () {
    $this->userRepository = $this->app->make(IUserRepository::class);
});

describe('C.R.U.D for User', function () {
    it('may create', function (User $user) {
        $user->delete();

        $success = $this->userRepository->save(new UserEntity(
            null,
            $user->name,
            new Credentials($user->email, $user->password),
            $user->remember_token,
            $user->created_at,
            $user->updated_at
        ));

        expect($success)->toBeTrue();
    })->with([
        'model' => fn() => User::factory()->create()
    ])->todo();
});
