<?php

namespace ch_2;

use function PHPUnit\Framework\throwException;

class LogAnalyzer {

    public bool $WasLastFileNameValid = false;

    public function IsValidLogFileName(string $fileName = ''): bool
    {

        $this->WasLastFileNameValid = false;

        if (!$fileName) {
            throw new \Exception("filename has to be provided.");
        }
        
        if(strcasecmp(substr($fileName, -4), '.slf') !== 0) {
            return false;
        }

        $this->WasLastFileNameValid = true;

        return true;
    }
}
