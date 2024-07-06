<?php

namespace Database\Seeders;

use App\Infrastructure\Models\User;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'test@example.com';

        if (! User::where('email', $email)->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => $email,
            ]);
        }
    }
}
