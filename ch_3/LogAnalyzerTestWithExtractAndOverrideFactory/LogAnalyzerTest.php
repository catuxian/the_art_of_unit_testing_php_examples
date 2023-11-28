<?php

namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory;

require_once 'vendor/autoload.php';

require_once 'FileExtensionManagerFactory.php';
require_once 'LogAnalyzerUsingFactoryMethod.php';
require_once 'FileExtensionManagerInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

/**
 * 擷取與覆寫
 */
class LogAnalyzerTest extends TestCase
{
    public function testOverrideTest()
    {
        $stub = new FakeExtensionManager;
        $stub->willBeValid = true;

        $logan = new TestableLogAnalyzer($stub);
        $result = $logan->IsValidLogFileName('file.ext');

        $this->assertTrue($result);
    }
}

class TestableLogAnalyzer extends LogAnalyzerUsingFactoryMethod
{
    public FileExtensionManagerInterface $manager;

    public function __construct(FileExtensionManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    protected function getManager(): FileExtensionManagerInterface
    {
        return $this->manager;
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
