<?php declare(strict_types=1);

namespace ch_5\src;

interface WebServiceInterface
{
    public function write(string $message): void;
}