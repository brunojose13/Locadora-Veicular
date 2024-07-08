<?php

declare(strict_types=1);

namespace App\Exceptions;

class CarNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Carro não encontrado!');
    }
}
