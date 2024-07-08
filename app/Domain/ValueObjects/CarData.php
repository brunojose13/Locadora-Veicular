<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class CarData
{
    public function __construct(
        private string $brand,
        private string $model,
        private int $age,
        private float $price
    ) {}

    public function toDatabase(): array
    {
        return [
            'brand' => $this->brand,
            'model' => $this->model,
            'age' => $this->age,
            'price' => $this->price
        ];
    }
}
