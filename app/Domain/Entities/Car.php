<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Contracts\IEntity;
use Illuminate\Support\Carbon;

class Car implements IEntity
{
    public function __construct(
        private ?int $id,
        private string $brand,
        private string $model,
        private int $age,
        private float $price,
        private ?Carbon $createdAt,
        private ?Carbon $updatedAt
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'brand' => $this->brand,
            'model' => $this->model,
            'age' => $this->age,
            'price' => $this->price,
            'created_at' => $this->createdAt?->toDateTimeString(),
            'updated_at' => $this->updatedAt?->toDateTimeString()
        ];
    }

    public function toDatabase(): array
    {
        $data = $this->toArray();

        unset($data['created_at']);
        unset($data['updated_at']);

        return $data;
    }
}
