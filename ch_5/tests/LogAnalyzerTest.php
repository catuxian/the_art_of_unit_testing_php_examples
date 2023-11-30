<?php declare(strict_types=1);
namespace ch_5\tests;

use PHPUnit\Framework\TestCase;


use ch_5\src\LoggerInterface;
use ch_5\src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    public function testAnalyze_TooShortName_CallLogger()
    {
        $logger = new FakeLogger;
        $analyzer = new LogAnalyzer($logger);

        $analyzer->minNameLength = 6;
        $analyzer->analyze("a.txt");
        $this->assertStringContainsString("too short", $logger->lastError);
    }
}
