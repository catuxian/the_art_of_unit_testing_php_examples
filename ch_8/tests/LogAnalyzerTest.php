<?php declare(strict_types=1);
namespace ch_8\tests;

use PHPUnit\Framework\TestCase;


use ch_8\src\LoggerInterface;
use ch_8\src\LogAnalyzer;

class LogAnalyzerTest extends TestCase
{
    /** @test */
    public function semanticsChange(): void
    {
        // $logan = new LogAnalyzer();
        // $logan->initialize();
        $logan = $this->makeDefaultAnalyzer();
        $this->assertFalse($logan->isValid("abc"));
    }

    // 使用工廠方法將LogAnalyzer的initialize包起來
    public static function makeDefaultAnalyzer(): LogAnalyzer
    {
        $analyzer = new LogAnalyzer();
        $analyzer->initialize();
        return $analyzer;
    }
}
