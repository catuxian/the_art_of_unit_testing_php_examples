<?php
namespace ch_3\LogAnalyzerTestWithFactory;

require_once 'FileExtensionManagerFactory.php';
require_once 'FileExtensionManagerInterface.php';

class LogAnalyzer
{
    private FileExtensionManagerInterface $manager;

    public function __construct(FileExtensionManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function isValidLogFileName(string $fileName)
    {
        return $this->manager->isValid($fileName);
    }
}