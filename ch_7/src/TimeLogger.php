<?php declare(strict_types=1);

namespace ch_7\src;

use DateTime;

class TimeLogger
{
    public static function createMessage(string $info)
    {
        return SystemTime::now()->format("Y-m-d H:i:s") . " " . $info;
    }
}
