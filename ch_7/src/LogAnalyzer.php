<?php
namespace ch_7\src;

class LogAnalyzer
{
    public function analyze(string $fileName)
    {
        if (strlen($fileName) < 8) {
            LoggingFacility::log("Filename too short: {$fileName}");
        }
    }
}