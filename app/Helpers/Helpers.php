<?php

namespace App\Helpers;

if (! function_exists('getClassShortName')) {
    function getClassShortName(object|string $objectOrClass)
    {
        $reflection = new \ReflectionClass($objectOrClass);
        
        return $reflection->getShortName();
    }
}
