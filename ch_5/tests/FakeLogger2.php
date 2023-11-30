<?php declare(strict_types=1);
namespace ch_5\tests;

use ch_5\src\LoggerInterface;

class FakeLogger2 implements LoggerInterface
{
    public ?\Exception $willThrow = null;
    public string $loggerGotMessage;

    public string $lastError;
    public function LogError(string $message): void
    {
        $this->lastError = $message;
        if (!is_null($this->willThrow)) {
            throw $this->willThrow;
        }
    }
}