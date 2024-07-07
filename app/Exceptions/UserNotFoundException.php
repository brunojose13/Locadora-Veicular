<?php

namespace App\Exceptions;

class UserNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Usuário não encontrado!');
    }
}
