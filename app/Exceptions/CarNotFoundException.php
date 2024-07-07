<?php

namespace App\Exceptions;

class CarNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Carro não encontrado!');
    }
}
