<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\ResponseInterface;

class JsonWriter
{
    public static array $meta = [];

    public static function success(ResponseInterface $response, array $data): ResponseInterface
    {
        $response = $response->withHeader('content-type', 'application/json');
        $response->getBody()->write(json_encode([
                'success' => true,
                'data' => $data,
                'meta' => self::$meta,
            ]));
        return $response;
    }

    public static function fail(ResponseInterface $response, array $errors): ResponseInterface
    {
        $response = $response->withHeader('content-type', 'application/json');
        $response->getBody()->write(json_encode([
                'success' => false,
                'errors' => $errors,
                'meta' => self::$meta,
            ]));
        return $response;
    }
}
