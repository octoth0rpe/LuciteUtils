<?php

declare(strict_types=1);

namespace Lucite\Utils;

class MockDbQuery implements DbQueryInterface
{
    public string $sql;
    public array $last_args;
    public mixed $expected_response;

    public function __construct(string $sql = '', mixed $expected_response = null)
    {
        $this->sql = $sql;
        $this->expected_response = $expected_response;
    }

    public function fetchAll(array $args = []): array
    {
        $this->last_args = $args;
        return $this->expected_response;
    }

    public function fetchOne(array $args = []): array
    {
        $this->last_args = $args;
        return $this->expected_response;
    }

    public function fetchColumn(array $args = []): mixed
    {
        $this->last_args = $args;
        return $this->expected_response;
    }
}
