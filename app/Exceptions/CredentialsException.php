<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException; 

class CredentialsException extends AuthenticationException
{
    public function __construct()
    {
        parent::__construct('O e-mail ou a senha estão inválidos');
    }
}
