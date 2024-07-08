<?php

use App\Domain\Contracts\Ports\Out\CarListOutput;
use App\Domain\Contracts\Ports\Out\CarOutput;
use App\Domain\Entities\Car as CarEntity;
use App\Domain\Services\CarService;
use App\Domain\ValueObjects\CarData;
use App\Infrastructure\Models\Car;

beforeEach(function () {
    $this->carService = $this->app->make(CarService::class);
});

describe('CRUD for Car', function () {
    it('gets all cars', function () {
        Car::factory()->create();
        $outputObject = $this->carService->getCars();

        expect($outputObject)->toBeInstanceOf(CarListOutput::class);
        expect($outputObject->getOutput())
            ->toBeArray()
            ->not->toBeEmpty();
    });

    it('creates a car', function (CarData $carData) {
        $outputObject = $this->carService->createCar($carData);
        $output = $outputObject->getOutput();
        
        expect($outputObject)->toBeInstanceOf(CarOutput::class);
        expect($output)
            ->toBeArray()
            ->not->toBeEmpty();
        
        expect($output['Car']['brand'])->toBe('Jeep')
            ->and($output['Car']['model'])->toBe('Renegade');
    })->with('carData');

    it('updates a car', function (Car $car) {
        $outputObject = $this->carService->updateCar(new CarEntity(
            $car->id,
            'Toyota',
            'Corolla',
            2021,
            300
        ));

        $output = $outputObject->getOutput();

        expect($outputObject)->toBeInstanceOf(CarOutput::class);
        expect($output)
            ->toBeArray()
            ->not->toBeEmpty();
        
        expect($output['Car']['brand'])->toBe('Toyota')
            ->and($output['Car']['model'])->toBe('Corolla')
            ->and($output['Car']['age'])->toBe(2021)
            ->and($output['Car']['price'])->toBe((float) 300);
    })->with('carModel');
});
