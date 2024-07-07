<?php

declare(strict_types=1);

namespace App\Helpers;

if (! function_exists('getClassShortName')) {
    function getClassShortName(object|string $objectOrClass): string
    {
        $reflection = new \ReflectionClass($objectOrClass);
        
        return $reflection->getShortName();
    }
}
