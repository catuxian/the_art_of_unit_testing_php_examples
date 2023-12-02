<?php
namespace ch_7\src;

class ConfigurationManager
{
    public function analyze(string $configName): bool
    {
        LoggingFacility::log("checking {$configName}");
        return true;
    }
}