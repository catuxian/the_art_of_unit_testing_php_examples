<?php
namespace ch_3\LogAnalyzerTestWithGetSet;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}