<?php
namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory;

require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

abstract class LogAnalyzerUsingFactoryMethod
{
    public function IsValidLogFileName(string $fileName)
    {
        return $this->getManager()->isValid($fileName);
    }

    // 回傳寫死的值
    abstract protected function getManager(): FileExtensionManagerInterface;
}