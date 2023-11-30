<?php
namespace ch_5\src;

interface FileNameRules
{
    public function isValidFileName(string $fileName): bool;
}