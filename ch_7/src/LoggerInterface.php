<?php declare(strict_types=1);

namespace ch_7\src;

interface LoggerInterface
{
    public function log(string $message): void;
}