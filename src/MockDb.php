<?php

declare(strict_types=1);

namespace Lucite\Utils;

class MockDb implements DbInterface
{
    public array $expected_responses;
    public array $last_args;

    public function __construct(array $expected_responses = [])
    {
        $this->expected_responses = $expected_responses;
    }

    public function addMockResponse(mixed $response): void
    {
        $this->expected_responses[] = $response;
    }

    public function query(string $sql): DbQueryInterface
    {
        return new MockDbQuery($sql, array_shift($this->expected_responses));
    }

    public function execute(string $sql, array $args = []): bool
    {
        $this->last_args = $args;
        return array_shift($this->expected_responses);
    }
}
