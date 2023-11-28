<?php
namespace ch_3\LogAnalyzerTestWithConstruct;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}