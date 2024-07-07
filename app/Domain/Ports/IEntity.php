<?php

declare(strict_types=1);

namespace App\Domain\Ports;

interface IEntity
{
    public function toArray(): array;
}
