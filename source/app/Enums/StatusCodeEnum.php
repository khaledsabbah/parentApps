<?php


namespace App\Enums;


final class StatusCodeEnum extends Enum
{

    const AUTHORIZED = 'authorised';
    const DECLIEND = 'decline';
    const REFUNDED = 'refunded';

    public static function _mappings()
    {
        return [
            100 => self::AUTHORIZED,
            200 => self::DECLIEND,
            300 => self::REFUNDED,
        ];
    }
}
