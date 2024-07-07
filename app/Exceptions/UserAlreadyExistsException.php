<?php

namespace App\Exceptions;

use Exception;

class UserAlreadyExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct('Já existe um cadastro com o e-mail informado!');
    }
}
