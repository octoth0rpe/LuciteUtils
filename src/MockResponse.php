<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Http\Message\ResponseInterface;

class MockResponse extends MockMessage implements ResponseInterface
{
    public int $status_code = 200;
    public string $reason_phrase = 'reason';

    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    public function withStatus(int $status_code, string $reasonPhrase = ''): ResponseInterface
    {
        $new = clone $this;
        $new->status_code = $status_code;
        $new->reason_phrase = $reasonPhrase;
        return $new;
    }

    public function getReasonPhrase(): string
    {
        return $this->reason_phrase;
    }
}
