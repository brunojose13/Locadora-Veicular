<?php

namespace App\Http\Responses;

use App\Domain\Ports\Output\IJsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArrayResponse implements IJsonResponse
{
    public function __construct(private array $data, private int $statusCode = 200)
    {
    }

    public function getResponse(): JsonResponse
    {
        $body = array_merge([
            'status' => Response::$statusTexts[$this->statusCode] ?? 'OK'
        ], $this->data);

        return response()->json($body, $this->statusCode);
    }
}
