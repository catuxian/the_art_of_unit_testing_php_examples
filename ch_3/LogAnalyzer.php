<?php
namespace ch_3;

require_once 'ExtensionManagerFactory.php';
require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

class LogAnalyzer
{
    private FileExtensionManagerInterface $manger;

    public function __construct(FileExtensionManagerInterface $mgr)
    {
        $this->manger = $mgr;
    }

    public function isValidLogFileName(string $fileName)
    {
        return $this->manger->isValid($fileName);
    }
}