<?php

declare(strict_types=1);

namespace App\Domain\Contracts\Ports\In;

use App\Domain\Contracts\Ports\Out\CarListOutput;
use App\Domain\Contracts\Ports\Out\CarOutput;
use App\Domain\Contracts\Ports\Out\DeletedCarOutput;
use App\Domain\Entities\Car;
use App\Domain\ValueObjects\CarData;

interface ICarService
{
    public function getCars(): CarListOutput;
    public function createCar(CarData $userData): CarOutput;
    public function updateCar(Car $car): CarOutput;
    public function getCarById(int $id): CarOutput;
    public function deleteCar(int $id): DeletedCarOutput;
}
