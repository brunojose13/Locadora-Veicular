<?php

declare(strict_types=1);

namespace App\Domain\Ports\Out;

class LogoutOutput
{
    public function __construct()
    {
    }

    public function getOutput(): string
    {
        return 'Usuário deslogado com sucesso!';
    }
}
