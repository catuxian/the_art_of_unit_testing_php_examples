<?php

namespace ch_4\example4_1;

interface WebServiceInterface
{
    public function logError(string $message): void;
}