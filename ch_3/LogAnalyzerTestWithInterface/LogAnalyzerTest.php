<?php
namespace ch_3\LogAnalyzerTestWithInterface;

require_once 'vendor/autoload.php';
require_once 'AlwaysValidFakeExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

/**
 * 擷取介面以便替換底層實作內容
 */
class LogAnalyzerTest extends TestCase
{
    public function testIsValidFileName_NameSupportedExtension_ReturnsTrue()
    {
        $log = new LogAnalyzer(new AlwaysValidFakeExtensionManager);
        $result = $log->isValidLogFileName('short.ext');

        $this->assertTrue($result);
    }

}