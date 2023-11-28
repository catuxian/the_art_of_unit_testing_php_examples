<?php
namespace ch_3\LogAnalyzerTestWithGetSet;

require_once 'vendor/autoload.php';
require_once 'AlwaysValidFakeExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

/**
 * 透過屬性get或set 注入假物件
 */
class LogAnalyzerTest extends TestCase
{
    public function testIsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager;
        $myFakeManager->willBeValid = true;

        $log = new LogAnalyzer();
        $log->setExtensionManager($myFakeManager);
        $result = $log->isValidLogFileName('short.ext');

        $this->assertTrue($result);
    }

    public function testIsValidFileName_ExtmanagerThrowsException_ReturnsFalse()
    {
        $myFakeManager = new FakeExtensionManager;
        $myFakeManager->willThrow = new \Exception("this is fake");

        $log = new LogAnalyzer();
        $log->setExtensionManager($myFakeManager);
        $result = $log->isValidLogFileName("anything.anyextension");
        $this->assertFalse($result);
    }
}

class FakeExtensionManager implements FileExtensionManagerInterface
{
    public bool $willBeValid = false;
    public ?\Exception $willThrow = null;

    public function isValid(string $fileName): bool
    {
        try {
            if ($this->willThrow !== null) {
                throw $this->willThrow;
            }
    
            return $this->willBeValid;
        } catch (\Exception $exception) {
            return false;
        }
    }
}