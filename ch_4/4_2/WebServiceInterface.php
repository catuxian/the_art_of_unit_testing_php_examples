<?php

namespace ch_4\example4_2;

interface WebServiceInterface
{
    public function logError(string $message): void;
}