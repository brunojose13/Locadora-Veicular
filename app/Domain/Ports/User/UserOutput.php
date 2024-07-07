<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\Entities\User;

use function App\Helpers\getClassShortName;

class UserOutput
{
    public function __construct(private User $user)
    {
    }

    public function getOutput(): array
    {
        return [
            getClassShortName($this->user) => $this->user->toArray()
        ];
    }
}
