<?php declare(strict_types=1);
namespace ch_8\src;

use ch_8\src\LoggerInterface;

class Logger implements LoggerInterface
{
    public string $lastError;
    public function LogError(string $message): void
    {
        $this->lastError = $message;
    }
}