<?php

namespace ch_4\example4_2;

interface EmailServiceInterface
{
    public function sendMail($emailInfo): void;
}
