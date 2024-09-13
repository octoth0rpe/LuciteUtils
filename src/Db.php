<?php

declare(strict_types=1);

namespace Lucite\Utils;

class Db implements DbInterface
{
    public \PDO $pdo;
    public function __construct(string $dsn)
    {
        $this->pdo = new \PDO($dsn);
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    public function query(string $sql): DbQueryInterface
    {
        return new DbQuery($this->pdo->prepare($sql));
    }

    public function execute(string $sql, array $args = []): bool
    {
        return $this->pdo->prepare($sql)->execute($args);
    }
}
