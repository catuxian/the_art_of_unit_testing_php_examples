<?php

use function PHPUnit\Framework\throwException;

class LogAnalyzer {
    public function IsValidLogFileName(string $fileName = ''): bool
    {

        if (!$fileName) {
            throw new \Exception("filename has to be provided.");
        }
        
        if(strcasecmp(substr($fileName, -4), '.slf') !== 0) {
            return false;
        }

        return true;
    }
}
