<?php

namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory2;

require_once 'vendor/autoload.php';

require_once 'LogAnalyzerUsingFactoryMethod.php';
require_once 'FileExtensionManagerInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

/**
 * 擷取與覆寫
 */
class LogAnalyzerTest extends TestCase
{
    public function testOverrideTestWithoutStub()
    {
        $logan = new TestableLogAnalyzer();
        $logan->isSupported = true;
        $result = $logan->IsValidLogFileName('file.ext');

        $this->assertTrue($result);
    }
}

class TestableLogAnalyzer extends LogAnalyzerUsingFactoryMethod
{
    public bool $isSupported;

    public function isValid(string $fileName): bool
    {
        // 回傳測試程式中設定的假值
        return $this->isSupported;
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
