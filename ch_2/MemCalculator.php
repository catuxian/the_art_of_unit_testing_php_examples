<?php

class MemCalculator {
    private int $sum = 0;

    public function Add($number): void
    {
        $this->sum += $number;
    }

    public function Sum(): int
    {
        $temp = $this->sum;
        $this->sum = 0;
        return $temp;
    }
}