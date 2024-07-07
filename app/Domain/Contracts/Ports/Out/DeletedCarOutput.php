<?php

declare(strict_types=1);

namespace App\Domain\Contracts\Ports\Out;

class DeletedCarOutput
{
    public function __construct()
    {
    }

    public function getOutput(): array
    {
        return [
            'deleted' => true,
            'message' => 'Carro deletado com sucesso'
        ];
    }
}
