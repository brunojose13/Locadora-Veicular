<?php

namespace App\Exceptions;

class UserAlreadyExistsException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Já existe um cadastro com o e-mail informado!');
    }
}
