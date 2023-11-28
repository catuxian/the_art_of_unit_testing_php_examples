<?php
namespace ch_3\LogAnalyzerTestWithFactory;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}