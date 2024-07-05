<?php

namespace App\Domain\Ports\Output;

use Symfony\Component\HttpFoundation\JsonResponse;

interface IJsonResponse
{
    public function getResponse(): JsonResponse;
}
