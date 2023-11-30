<?php declare(strict_types=1);

namespace ch_5\src;

interface LoggerInterface
{
    public function LogError(string $message): void;
}