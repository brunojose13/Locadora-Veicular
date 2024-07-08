<?php

use App\Infrastructure\Models\User;

dataset('userModel', [
    'userModel' => fn() => User::factory()->create()
]);
