<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class MockMessage implements MessageInterface
{
    public function getProtocolVersion(): string
    {
        return '1.1';
    }

    public function withProtocolVersion(string $version): RequestInterface
    {
        return $this;
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function hasHeader(string $name): bool
    {
        return false;
    }
    public function getHeader(string $name): array
    {
        return [];
    }
    public function getHeaderLine(string $name): string
    {
        return '';
    }
    public function withHeader(string $name, $value): RequestInterface
    {
        return $this;
    }
    public function withAddedHeader(string $name, $value): RequestInterface
    {
        return $this;
    }
    public function withoutHeader(string $name): RequestInterface
    {
        return $this;
    }
    public function getBody(): StreamInterface
    {
        return new MockStream();
    }
    public function withBody(StreamInterface $body): RequestInterface
    {
        return $this;
    }
}
