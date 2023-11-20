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

    public function testIsValidFileName_EmptyFileName_ThrowsException()
    {
        $logAnalyzer = new LogAnalyzer;
        $fileName = '';

        $this->expectException(\Exception::class);
        $logAnalyzer->IsValidLogFileName($fileName);
    }

    public function testIsValidFileName_EmptyFileName_Throws()
    {
        try {
            $logAnalyzer = new LogAnalyzer;
            $fileName = '';

            $logAnalyzer->IsValidLogFileName($fileName);

        } catch (\Exception $exception) {
            $this->assertStringContainsString("filename has to be provided.", $exception->getMessage());
        }
    }
}