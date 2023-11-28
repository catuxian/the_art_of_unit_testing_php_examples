<?php
namespace ch_3\LogAnalyzerTestWithInterface;

require_once 'FileExtensionManagerInterface.php';

class AlwaysValidFakeExtensionManager implements FileExtensionManagerInterface
{
    public function isValid(string $fileName)
    {
        return true;
    }
}