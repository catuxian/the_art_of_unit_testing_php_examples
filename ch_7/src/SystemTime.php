<?php declare(strict_types=1);

namespace ch_7\src;

use DateTime;

class SystemTime
{
    private static ?DateTime $_date = null;

    public static function set(DateTime $custom): void
    {
        self::$_date = $custom;
    }

    public static function reset()
    {
        self::$_date = DateTime::createFromFormat('Y-m-d H:i:s', '0001-01-01 00:00:00')->setTimestamp(0);
    }

    public static function now(): DateTime {
        if (self::$_date !== null && self::$_date != DateTime::createFromFormat('Y-m-d H:i:s', '0001-01-01 00:00:00')) {
            return self::$_date;
        }
        return new DateTime();
    }
}