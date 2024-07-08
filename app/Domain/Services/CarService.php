<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Contracts\Ports\In\ICarService;
use App\Domain\Contracts\Ports\Out\CarListOutput;
use App\Domain\Contracts\Ports\Out\CarOutput;
use App\Domain\Contracts\Ports\Out\DeletedCarOutput;
use App\Domain\Contracts\Ports\Out\ICarRepository;
use App\Domain\Entities\Car;
use App\Domain\ValueObjects\CarData;
use App\Exceptions\UserAlreadyExistsException;
use App\Exceptions\CarNotFoundException;

class CarService implements ICarService
{
    public function __construct(private ICarRepository $carRepository)
    {
    }

    public function getCars(): CarListOutput
    {
        return new CarListOutput($this->carRepository->all());
    }

    public function createCar(CarData $userData): CarOutput
    {
        return new CarOutput(
            $this->carRepository->save($userData)
        );
    }

    public function updateCar(Car $car): CarOutput
    {
        $car = $this->carRepository->update($car);

        if (empty($car)) {
            throw new CarNotFoundException();
        }

        return new CarOutput($car);
    }

    public function getCarById(int $id): CarOutput
    {
        $car = $this->carRepository->getById($id);

        if (empty($car)) {
            throw new CarNotFoundException();
        }

        return new CarOutput($car);
    }

    public function deleteCar(int $id): DeletedCarOutput
    {
        $wasDeleted = $this->carRepository->delete($id);

        if (! $wasDeleted) {
            throw new CarNotFoundException();
        }

        return new DeletedCarOutput();
    }

    public function getDeletedCars(): CarListOutput
    {
        return new CarListOutput($this->carRepository->allDeleted());
    }
}
