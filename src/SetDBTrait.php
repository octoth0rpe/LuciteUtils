<?php

declare(strict_types=1);

namespace Lucite\Utils;

trait SetDBTrait
{
    public DbInterface $db;

    public function setDb(DbInterface $db): void
    {
        $this->db = $db;
    }
}
