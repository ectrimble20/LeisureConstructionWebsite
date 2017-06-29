<?php

namespace Leisure\Library\Common;

use Leisure\Application\Model\Mapper\AuditMapper;

class Audit {

    const INFO = 1;
    const NOTICE = 2;
    const ALERT = 3;
    const CRITICAL = 4;

    private static function Log($level, $message)
    {
        AuditMapper::Insert($message, $level);
    }

    public static function info($message)
    {
        self::Log(Audit::INFO, $message);
    }

    public static function notice($message)
    {
        self::Log(Audit::NOTICE, $message);
    }

    public static function alert($message)
    {
        self::Log(Audit::ALERT, $message);
    }

    public static function critical($message)
    {
        self::Log(Audit::CRITICAL, $message);
    }


}