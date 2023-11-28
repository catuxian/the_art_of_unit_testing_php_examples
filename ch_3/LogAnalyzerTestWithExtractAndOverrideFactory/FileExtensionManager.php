<?php
namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory;

require_once 'FileExtensionManagerInterface.php';

class FileExtensionManager implements FileExtensionManagerInterface
{
    public function isValid(string $fileName)
    {
        if(strcasecmp(substr($fileName, -4), '.slf') !== 0) {
            return false;
        }
        return true;
    }
}