<?php

require_once 'vendor/autoload.php';
require_once 'MemCalculator.php';

use PHPUnit\Framework\TestCase;

class MemCalculatorTests extends TestCase
{
    public function testSumByDefaultReturnsZero()
    {
        $calc = $this->makeCalc();
        $lastSum = $calc->sum();
        $this->assertEquals(0, $lastSum);
    }

    public function testAddWhenCalledChangesSum()
    {
        $calc = $this->makeCalc();
        $calc->add(1);
        $sum = $calc->sum();
        $this->assertEquals(1, $sum);
    }

    private function makeCalc()
    {
        return new MemCalculator();
    }
}