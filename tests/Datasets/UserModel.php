<?php

use App\Infrastructure\Models\User;

dataset('user', [
    'model' => fn() => User::factory()->create()
]);