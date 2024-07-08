<?php

declare(strict_types=1);

namespace App\Domain\Ports\Out;

use App\Domain\Entities\Car;

use function App\Helpers\getClassShortName;

class CarOutput
{
    public function __construct(private Car $car)
    {
    }

    public function getOutput(): array
    {
        return [
            getClassShortName($this->car) => $this->car->toArray()
        ];
    }
}
