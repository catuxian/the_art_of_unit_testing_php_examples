<?php
namespace ch_3\LogAnalyzerTestWithInterface;

require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

class LogAnalyzer
{
    private FileExtensionManagerInterface $manager;

    public function __construct(FileExtensionManagerInterface $mgr)
    {
        $this->manager = $mgr;
    }

    public function isValidLogFileName(string $fileName)
    {
        return $this->manager->isValid($fileName);
    }
}