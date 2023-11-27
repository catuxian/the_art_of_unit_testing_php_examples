<?php
namespace ch_3;

require_once 'FileExtensionManagerInterface.php';

class FileExtensionManager implements FileExtensionManagerInterface
{
    public function isValid(string $fileName)
    {
        // read some file here
    }
}