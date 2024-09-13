<?php

declare(strict_types=1);

namespace Lucite\Utils;

class DbQuery implements DbQueryInterface
{
    public \PDOStatement $statement;

    public function __construct(\PDOStatement $statement)
    {
        $this->statement = $statement;
    }

    public function fetchAll(array $args = []): array
    {
        $this->statement->execute($args);
        return $this->statement->fetchAll();
    }

    public function fetchOne(array $args = []): array
    {
        $this->statement->execute($args);
        return $this->statement->fetch();
    }

    public function fetchColumn(array $args = []): mixed
    {
        $this->statement->execute($args);
        return $this->statement->fetchColumn(0);
    }
}
