<?php
namespace ch_3\LogAnalyzerTestWithInterface;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}