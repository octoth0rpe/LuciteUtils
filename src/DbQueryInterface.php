<?php

declare(strict_types=1);

namespace Lucite\Utils;

interface DbQueryInterface
{
    public function fetchAll(array $args = []): array;
    public function fetchOne(array $args = []): array;
    public function fetchColumn(array $args = []): mixed;
}
