<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\StreamInterface;

class MockStream implements StreamInterface
{
    public function __toString(): string
    {
        return '';
    }
    public function close(): void
    {
    }
    public function detach(): null
    {
        return null;
    }
    public function getSize(): int | null
    {
        return null;
    }
    public function tell(): int
    {
        return 0;
    }
    public function eof(): bool
    {
        return false;
    }
    public function isSeekable(): bool
    {
        return false;
    }
    public function seek(int $offset, int $whence = \Psr\Http\Message\SEEK_SET): void
    {
    }
    public function rewind(): void
    {
    }
    public function isWritable(): bool
    {
        return true;
    }
    public function write(string $string): int
    {
        return 0;
    }
    public function isReadable(): bool
    {
        return true;
    }
    public function read(int $length): string
    {
        return '';
    }
    public function getContents(): string
    {
        return '';
    }
    public function getMetadata(?string $key = null): mixed
    {
        return null;
    }
}
