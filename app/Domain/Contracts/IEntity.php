<?php

declare(strict_types=1);

namespace App\Domain\Contracts;

interface IEntity
{
    public function toArray(): array;
}
