<?php

require_once 'vendor/autoload.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

class LogAnalyzerTestsWithSetupTearDown extends TestCase{

    private ?LogAnalyzer $logAnalyzer;

    public function setUp(): void
    {
        $this->logAnalyzer = new LogAnalyzer;
    }

    public function testIsValidFileName_VariousExtensions_ChecksThem()
    {
        $result = $this->logAnalyzer->IsValidLogFileName("whatever.SLF");
        $this->assertTrue($result, "filename should be valid!");
    }

    public function TearDown(): void
    {
        $this->logAnalyzer = null;
    }
}