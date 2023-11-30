<?php
namespace ch_5\src;

class LogAnalyzer
{
    private LoggerInterface $logger;

    public int $minNameLength;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < $this->minNameLength) {
            $this->logger->logError("Filename too short: {$fileName}");
        }
    }
}