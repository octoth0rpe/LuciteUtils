<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class MockRequest implements RequestInterface
{
    public string $method = 'GET';
    public UriInterface $uri;
    public function __construct(string $method = 'GET', string $path = '/test')
    {
        $this->method = $method;
        $this->uri = (new MockUri())->withPath($path);
    }

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
    public function getRequestTarget(): string
    {
        return '';
    }
    public function withRequestTarget(mixed $requestTarget): RequestInterface
    {
        return $this;
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function withMethod(string $method): RequestInterface
    {
        $new = clone $this;
        $new->method = $method;
        return $new;
    }
    public function getUri(): UriInterface
    {
        return $this->uri;
    }
    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        $new = clone $this;
        $new->uri = $uri;
        return $new;
    }
}
