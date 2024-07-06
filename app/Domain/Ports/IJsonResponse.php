<?php

declare(strict_types=1);

namespace App\Domain\Ports;

use Symfony\Component\HttpFoundation\JsonResponse;

interface IJsonResponse
{
    public function getResponse(): JsonResponse;
}
