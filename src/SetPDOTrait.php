<?php

declare(strict_types=1);

namespace Lucite\Utils;

trait SetPDOTrait
{
    public \PDO $pdo;

    public function setPDO(\PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}
