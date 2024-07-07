<?php

namespace App\Exceptions;

use App\Domain\Contracts\IEntity;

use function App\Helpers\getClassShortName;

class InvalidCollectionDataException extends \Exception
{
    public function __construct(string $collectionClass, string $expectedClass)
    {
        parent::__construct(
            "Os valores da coleção $collectionClass não são instâncias da entidade $expectedClass, ou, a entidade $expectedClass não implementa a interface " . 
            getClassShortName(IEntity::class)
        );
    }
}
