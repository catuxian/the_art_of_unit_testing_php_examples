<?php
namespace ch_5\src;

class LogAnalyzer2
{
    private LoggerInterface $logger;
    private WebServiceInterface $webService;
    public int $minNameLength;

    public function __construct(LoggerInterface $logger, WebServiceInterface $webService)
    {
        $this->logger = $logger;
        $this->webService = $webService;
    }

    public function analyze(string $fileName)
    {
        if (strlen($fileName) < $this->minNameLength) {
            try {
                $this->logger->logError("Filename too short: {$fileName}");
            } catch (\Exception $e) {
                $this->webService->write("Error From Logger: {$e->getMessage()}");
            }
        }
    }
}