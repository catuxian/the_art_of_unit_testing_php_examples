<?php declare(strict_types=1);

namespace ch_8\src;

interface LoggerInterface
{
    public function LogError(string $message): void;
}