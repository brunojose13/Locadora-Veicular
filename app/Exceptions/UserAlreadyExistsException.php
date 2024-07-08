<?php

declare(strict_types=1);

namespace App\Exceptions;

class UserAlreadyExistsException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Já existe um cadastro com o e-mail informado!');
    }
}
