<?php
namespace ch_3;

use PHPUnit\Framework\Constraint\FileExists;

require_once 'FileExtensionManager.php';
require_once 'FileExtensionManagerInterface.php';

class ExtensionManagerFactory
{
    private ?FileExtensionManagerInterface $customManager = null;

    public function create(): FileExtensionManagerInterface
    {
        if ($this->customManager !== null) {
            return $this->customManager;
        }
        return new FileExtensionManager;
    }

    public function setManager(FileExtensionManagerInterface $manager)
    {
        $this->customManager = $manager;
    }
}