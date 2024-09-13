<?php

declare(strict_types=1);

namespace Lucite\Utils;

interface DbInterface
{
    public function query(string $sql): DbQueryInterface;
    public function execute(string $sql, array $args = []): bool;
}
