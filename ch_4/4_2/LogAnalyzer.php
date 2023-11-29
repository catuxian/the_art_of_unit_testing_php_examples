<?php

namespace ch_4\example4_2;

require_once 'EmailServiceInterface.php';
require_once 'WebServiceInterface.php';

class LogAnalyzer
{
    private WebServiceInterface $service;
    private EmailServiceInterface $email;

    public function __construct(WebServiceInterface $service, EmailServiceInterface $email)
    {
        $this->email = $email;
        $this->service = $service;
    }
    public function getService(): WebServiceInterface
    {
        return $this->service;
    }

    public function setService(WebServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getEmail(): EmailServiceInterface
    {
        return $this->email;
    }

    public function setEmail(EmailServiceInterface $email)
    {
        $this->email = $email;
    }

    public function analyze(string $fileName)
    {
        if(strlen($fileName) < 8)
        {
            try {
                $this->service->logError("Filename too short:" . $fileName);
            } catch (\Exception $e) {
                $this->email->sendMail("someone@somewhere.com", "can't log", $e->getMessage());
            }
        }
    }
}
