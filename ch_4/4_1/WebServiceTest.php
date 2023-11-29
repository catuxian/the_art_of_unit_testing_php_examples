<?php

namespace ch_4\example4_1;

require_once 'WebServiceInterface.php';
require_once 'FakeWebService.php';

use PHPUnit\Framework\TestCase;

class WebServiceTest extends TestCase
{
    public function testAnalyze_TooShortFileName_CallsWebService()
    {
        $mockService = new FakeWebService;
        $log = new LogAnalyzer($mockService);
        $tooShortFileName = "abc.ext";
        $log->analyze($tooShortFileName);

        $this->assertStringContainsString("Filename too short:abc.ext", $mockService->lastError);
    }
}

class LogAnalyzer
{
    private WebServiceInterface $service;

    public function __construct(WebServiceInterface $service)
    {
        $this->service = $service;
    }

    public function analyze(string $fileName)
    {
        if(strlen($fileName) < 8) {
            $this->service->logError("Filename too short:" . $fileName);
        }
    }
}