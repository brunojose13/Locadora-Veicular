<?php

use App\Domain\ValueObjects\CarData;
use App\Infrastructure\Models\Car;

dataset('carData', [
    'carData' => new CarData(
        'Jeep',
        'Renegade',
        2022,
        150.00
    )
]);

dataset('carModel', [
    'carModel' => fn() => Car::factory()->create([
        'brand' => 'Jeep',
        'model' => 'Renegade',
        'age' => 2022,
        'price' => 150.00
    ])
]);
