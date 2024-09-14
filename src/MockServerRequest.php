<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\ServerRequestInterface;

class MockServerRequest extends MockRequest implements ServerRequestInterface
{
    public function getServerParams(): array
    {
        return [];
    }

    public function getCookieParams(): array
    {
        return [];
    }

    public function withCookieParams(array $cookies): ServerRequestInterface
    {
        return $this;
    }

    public function getQueryParams(): array
    {
        return [];
    }

    public function withQueryParams(array $params): ServerRequestInterface
    {
        return $this;
    }

    public function getUploadedFiles(): array
    {
        return [];
    }

    public function withUploadedFiles(array $files): ServerRequestInterface
    {
        return $this;
    }

    public function getParsedBody(): null | array | object
    {
        return null;
    }

    public function withParsedBody($data): ServerRequestInterface
    {
        return $this;
    }

    public function getAttributes(): array
    {
        return [];
    }

    public function getAttribute(string $name, $default = null): mixed
    {
        return null;
    }

    public function withAttribute(string $name, mixed $value): ServerRequestInterface
    {
        return $this;
    }

    public function withoutAttribute(string $name): ServerRequestInterface
    {
        return $this;
    }
}
