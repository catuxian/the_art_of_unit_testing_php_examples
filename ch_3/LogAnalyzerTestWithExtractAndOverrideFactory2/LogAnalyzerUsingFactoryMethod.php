<?php
namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory2;

require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

abstract class LogAnalyzerUsingFactoryMethod
{
    public function IsValidLogFileName(string $fileName)
    {
        return $this->isValid($fileName);
    }

    public function isValid(string $fileName): bool
    {
        $mgr = new FileExtensionManager();
        // 回傳真實相依的物件結果
        return $mgr->isValid($fileName);
    }
}