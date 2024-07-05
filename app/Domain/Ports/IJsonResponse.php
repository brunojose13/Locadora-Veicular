<?php

namespace App\Domain\Ports;

use Symfony\Component\HttpFoundation\JsonResponse;

interface IJsonResponse
{
    public function getResponse(): JsonResponse;
}
