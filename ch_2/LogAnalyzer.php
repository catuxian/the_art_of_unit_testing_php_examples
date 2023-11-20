<?php

class LogAnalyzer {
    public function IsValidLogFileName(string $fileName): bool
    {

        if(strcasecmp(substr($fileName, -4), '.slf') !== 0) {
            return false;
        }

        return true;
    }
}
