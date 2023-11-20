<?php

require_once 'vendor/autoload.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class LogAnalyzerTestsWithDataProvider extends TestCase{

    public static function additionProvider(): array
    {
        return [
            ["filewithbadextension.foo", false],
            ["filewithbadextension.slf", true],
            ["filewithbadextension.SLF", true]
        ];
    }

    #[DataProvider('additionProvider')]
    public function testIsValidFileName_VariousExtensions_ChecksThem(string $file, bool $expected)
    {
        $logAnalyzer = new LogAnalyzer;
        $result = $logAnalyzer->IsValidLogFileName($file);
        $this->assertSame($expected, $result);
    }
}