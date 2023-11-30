<?php declare(strict_types=1);
namespace ch_5\tests;

use ch_5\src\LoggerInterface;

class FakeLogger implements LoggerInterface
{
    public string $lastError;
    public function LogError(string $message): void
    {
        $this->lastError = $message;
    }
}