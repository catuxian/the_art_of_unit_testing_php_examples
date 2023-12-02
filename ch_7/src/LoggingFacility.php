<?php declare(strict_types=1);

namespace ch_7\src;

class LoggingFacility
{
    private static LoggerInterface $logger;

    public static function log(string $text): void
    {
        self::$logger->log($text);
    }

    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }
    
    public static function getLogger(): LoggerInterface
    {
        return self::$logger;
    }
}