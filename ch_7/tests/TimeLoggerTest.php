<?php declare(strict_types=1);
namespace ch_7\tests;

use PHPUnit\Framework\TestCase;

use ch_7\src\SystemTime;
use ch_7\src\TimeLogger;
use DateTime;

class TimeLoggerTest extends TestCase
{
    /** @test */
    public function settingSystemTime_Always_ChangesTime()
    {
        SystemTime::set(new DateTime("2023-12-01"));
        $output = TimeLogger::createMessage("a");
        $this->assertStringContainsString("2023-12-01", $output);
    }

    public function tearDown(): void
    {
        SystemTime::reset();
    }
}
