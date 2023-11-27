<?php
namespace ch_3;


interface FileExtensionManagerInterface
{
    public function isValid(string $fileName);
}