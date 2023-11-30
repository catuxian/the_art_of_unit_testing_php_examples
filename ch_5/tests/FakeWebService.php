<?php declare(strict_types=1);

namespace ch_5\tests;

use ch_5\src\WebServiceInterface;

class FakeWebService implements WebServiceInterface
{
    public string $messageToWebService;

    public function write(string $message): void
    {
        $this->messageToWebService = $message;
    }
}