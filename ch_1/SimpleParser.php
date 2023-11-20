<?php

class SimpleParser
{

    public function parseAndSum($numbers)
    {
        if (strlen($numbers) === 0) {
            return 0;
        }

        if (!strpos($numbers, ',')) {
            return intval($numbers);
        } else {
            throw new \InvalidArgumentException("I can only handle 0 or 1 numbers for now!");
        }
    }
}
