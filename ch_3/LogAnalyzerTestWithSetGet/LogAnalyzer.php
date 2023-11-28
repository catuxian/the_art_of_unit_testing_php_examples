<?php
namespace ch_3\LogAnalyzerTestWithGetSet;

require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

class LogAnalyzer
{
    private FileExtensionManagerInterface $manager;

    public function __construct()
    {
        $this->manager = new FileExtensionManager;
    }

    public function setExtensionManager(FileExtensionManagerInterface $mgr)
    {
        $this->manager = $mgr;
    }

    public function getExtensionManager(): FileExtensionManagerInterface
    {
        return $this->manager;
    }

    public function isValidLogFileName(string $fileName)
    {
        return $this->manager->isValid($fileName);
    }
}