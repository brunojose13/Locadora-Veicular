<?php

namespace Database\Seeders;

use App\Infrastructure\Models\Car;
use App\Infrastructure\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TestUserSeeder::class);
        $this->call(RealCarsSeeder::class);

        User::factory(10)->create();
    }
}
