<?php declare(strict_types=1);

namespace ch_5\src;

interface ComplicatedInterface
{
    public function method1(string $a, string $b, bool $c, int $x, object $o);
    public function method2(string $b, bool $c, int $x, object $o);
    public function method3(bool $c, int $x, object $o);
}