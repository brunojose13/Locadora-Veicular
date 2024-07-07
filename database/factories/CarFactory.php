<?php

namespace Database\Factories;

use App\Infrastructure\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->word(),
            'model' => fake()->word(),
            'age' => fake()->numberBetween(2019, 2024),
            'price' => fake()->numberBetween(50, 500)
        ];
    }
}
