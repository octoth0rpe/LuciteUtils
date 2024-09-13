<?php

declare(strict_types=1);

namespace Lucite\Utils;

use Psr\Log\LoggerInterface;

trait SetLoggerTrait
{
    public LoggerInterface $logger;

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
