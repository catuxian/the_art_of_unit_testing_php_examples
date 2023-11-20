<?php

require_once 'vendor/autoload.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

class LogAnalyzerTests extends TestCase{
    public function testIsValidFileName_BadExtension_ReturnsFalse()
    {
        $logAnalyzer = new LogAnalyzer;
        $result = $logAnalyzer->IsValidLogFileName("filewithbadextension.foo");
        $this->assertFalse($result);
    }

    public function testIsValidFileName_GoodExtensionLowercase_ReturnsTrue()
    {
        $logAnalyzer = new LogAnalyzer;
        $result = $logAnalyzer->IsValidLogFileName("filewithbadextension.slf");
        $this->assertTrue($result);
    }

    public function testIsValidFileName_GoodExtensionUppercase_ReturnsTrue()
    {
        $logAnalyzer = new LogAnalyzer;
        $result = $logAnalyzer->IsValidLogFileName("filewithbadextension.SLF");
        $this->assertTrue($result);
    }
}