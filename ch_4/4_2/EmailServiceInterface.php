<?php

namespace ch_4\example4_2;

interface EmailServiceInterface
{
    public function sendMail(string $to, string $subject, string $body): void;
}
