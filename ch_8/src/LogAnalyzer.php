<?php declare(strict_types=1);

namespace ch_8\src;

use ch_8\src\Logger;

class LogAnalyzer
{
    private LoggerInterface $logger;

    public function initialize()
    {
        $this->logger = new Logger();
    }

    public function isValid(string $fileName): bool
    {
        if(strlen($fileName) < 8) {
            $this->logger->LogError("Filename too short: {$fileName}");
            return false;
        }

        return true;
    }
}