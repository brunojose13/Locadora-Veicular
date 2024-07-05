<?php

use App\Domain\ValueObjects\Credentials;
use App\Infrastructure\Models\User;

describe('User C.R.U.D', function () {
    it('may store', function (User $user) {
        $user->delete();

        $userEntity = $userRepository->save(new \App\Domain\Entities\User(
            $user->id ,
            $user->name,
            new Credentials($user->email, $user->password),
            $user->email_verified_at,
            $user->remember_token,
            $user->created_at,
            $user->updated_at
        ));

        expect($userEntity)->toBeInstanceOf(UserRepository::class);
        expect($userEntity)->has(UserRepository::class);
    })->with([
        'user' => fn() => User::factory()->create()
    ]);
});
