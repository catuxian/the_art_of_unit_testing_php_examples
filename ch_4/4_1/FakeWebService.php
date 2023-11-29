<?php

namespace ch_4\example4_1;

require_once 'WebServiceInterface.php';

class FakeWebService implements WebServiceInterface
{
    public string $lastError;

    public function logError(string $message): void
    {
        $this->lastError = $message;
    }
}