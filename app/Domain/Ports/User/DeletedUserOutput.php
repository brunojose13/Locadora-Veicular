<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\Entities\User;

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
