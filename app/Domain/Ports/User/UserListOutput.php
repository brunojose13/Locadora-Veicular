<?php

declare(strict_types=1);

namespace App\Domain\Ports\User;

use App\Domain\Entities\Collections\UserCollection;

use function App\Helpers\getClassShortName;

class UserListOutput
{
    public function __construct(private UserCollection $userCollection)
    {
    }

    public function getOutput(): array
    {
        return [
            getClassShortName($this->userCollection) => $this->userCollection->toArray()
        ];
    }
}
