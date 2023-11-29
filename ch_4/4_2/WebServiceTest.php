<?php

namespace ch_4\example4_2;

require_once 'WebServiceInterface.php';
require_once 'EmailServiceInterface.php';
require_once 'LogAnalyzer.php';

use PHPUnit\Framework\TestCase;

class WebServiceTest extends TestCase
{
    public function testAnalyze_WebServiceThrows_sendsEmail()
    {
        $mockService = new FakeWebService;
        $mockService->toThrow = new \Exception("fake exception");
        
        $mockEmail = new FakeEmailService;
        $log = new LogAnalyzer($mockService, $mockEmail);
        $tooShortFileName = "abc.ext";
        $log->analyze($tooShortFileName);

        $this->assertStringContainsString("someone@somewhere.com", $mockEmail->to);
        $this->assertStringContainsString("can't log", $mockEmail->subject);
        $this->assertStringContainsString("fake exception", $mockEmail->body);
    }
}

class FakeWebService implements WebServiceInterface
{
    public ?\Exception $toThrow;

    public function logError(string $message): void
    {
        if(!is_null($this->toThrow)) {
            throw $this->toThrow;
        }
    }
}

class FakeEmailService implements EmailServiceInterface
{
    public string $to;
    public string $subject;
    public string $body;

    public function sendMail(string $to, string $subject, string $body): void
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }
}