<?php

namespace ch_3\LogAnalyzerTestWithFactory;

require_once 'vendor/autoload.php';

require_once 'FileExtensionManagerFactory.php';
require_once 'FileExtensionManagerInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

/**
 * 工廠模式
 */
class LogAnalyzerTest extends TestCase
{
    public function testIsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $myFakeManager = new FakeExtensionManager;
        $myFakeManager->willBeValid = true;

        $FileExtensionManagerFactory = (new FileExtensionManagerFactory);
        $FileExtensionManagerFactory->setManager($myFakeManager);
        $fileExtensionManagerFactory = $FileExtensionManagerFactory->create();

        $log = new LogAnalyzer($fileExtensionManagerFactory);
        $result = $log->isValidLogFileName('short.ext');

        $this->assertTrue($result);
    }

    public function testIsValidFileName_ExtmanagerThrowsException_ReturnsFalse()
    {
        $myFakeManager = new FakeExtensionManager;
        $myFakeManager->willThrow = new \Exception("this is fake");

        $FileExtensionManagerFactory = (new FileExtensionManagerFactory);
        $FileExtensionManagerFactory->setManager($myFakeManager);
        $fileExtensionManagerFactory = $FileExtensionManagerFactory->create();

        $log = new LogAnalyzer($fileExtensionManagerFactory);
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
