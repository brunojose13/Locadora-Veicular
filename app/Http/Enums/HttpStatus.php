<?php

namespace App\Http\Enums;

class HttpStatus
{
    /* 2xx - solicitação do cliente foi recebida, compreendida e aceita com sucesso */
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NO_CONTENT = 204;

    /* 3xx - cliente precisa tomar medidas adicionais para concluir a solicitação */
    const FOUND = 302;
    const NOT_MODIFIED = 304;

    /* 4xx - houve um problema com a solicitação enviada pelo cliente */
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;

    /* 5xx - o servidor falhou ao cumprir uma solicitação válida */
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const SERVICE_UNAVAILABLE = 503;
}
