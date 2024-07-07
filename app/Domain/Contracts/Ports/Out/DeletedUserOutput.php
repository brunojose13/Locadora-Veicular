<?php

declare(strict_types=1);

namespace App\Domain\Contracts\Ports\Out;

class DeletedUserOutput
{
    public function __construct()
    {
    }

    public function getOutput(): array
    {
        return [
            'deleted' => true,
            'message' => 'Usuário deletado com sucesso'
        ];
    }
}
