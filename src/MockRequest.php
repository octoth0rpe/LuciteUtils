<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class MockRequest extends MockMessage implements RequestInterface
{
    public string $method = 'GET';
    public UriInterface $uri;

    public function __construct(string $method = 'GET', string $path = '/test')
    {
        $this->method = $method;
        $this->uri = (new MockUri())->withPath($path);
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
