<?php

namespace Database\Seeders;

use App\Infrastructure\Models\Car;
use Illuminate\Database\Seeder;

class RealCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carsList = [
            [
                'brand' => 'Fiat',
                'model' => 'Uno',
                'age' => 2020,
                'price' => 80.00,
            ],
            [
                'brand' => 'Chevrolet',
                'model' => 'Onix',
                'age' => 2021,
                'price' => 90.00,
            ],
            [
                'brand' => 'Volkswagen',
                'model' => 'Gol',
                'age' => 2019,
                'price' => 80.00,
            ],
            [
                'brand' => 'Ford',
                'model' => 'Ka',
                'age' => 2021,
                'price' => 80.00,
            ],
            [
                'brand' => 'Renault',
                'model' => 'Sandero',
                'age' => 2020,
                'price' => 90.00,
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'HB20',
                'age' => 2022,
                'price' => 90.00,
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Etios',
                'age' => 2019,
                'price' => 100.00,
            ],
            [
                'brand' => 'Honda',
                'model' => 'Fit',
                'age' => 2020,
                'price' => 120.00,
            ],
            [
                'brand' => 'Nissan',
                'model' => 'March',
                'age' => 2021,
                'price' => 90.00,
            ],
            [
                'brand' => 'Jeep',
                'model' => 'Renegade',
                'age' => 2022,
                'price' => 150.00,
            ],
        ];

        foreach ($carsList as $car) {
            Car::updateOrCreate(
                [
                    'brand' => $car['brand'], 
                    'model' => $car['model']
                ],
                [
                    'age' => $car['age'], 
                    'price' => $car['price']
                ]
            );
        }
    }
}
