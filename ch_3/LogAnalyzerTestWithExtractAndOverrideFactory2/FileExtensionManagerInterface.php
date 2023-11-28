<?php
namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory2;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}