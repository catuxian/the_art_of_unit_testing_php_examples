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

        $expectedEmail = new EmailInfo;
        $expectedEmail->body = "fake exception";
        $expectedEmail->to = "someone@somewhere.com";
        $expectedEmail->subject = "can't log";

        $this->assertObjectEquals($expectedEmail, $mockEmail->email);
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
    public ?EmailInfo $email = null;

    public function sendMail($emailInfo): void
    {
        $this->email = $emailInfo;
    }
}