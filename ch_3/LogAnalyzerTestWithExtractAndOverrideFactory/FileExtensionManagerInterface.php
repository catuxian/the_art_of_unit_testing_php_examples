<?php
namespace ch_3\LogAnalyzerTestWithExtractAndOverrideFactory;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}