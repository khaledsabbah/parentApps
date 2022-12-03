<?php


namespace App\Enums;


Abstract class Enum
{
    public static function toArray()
    {
        $reflectionClass = new \ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }


    public static function implode($separator=",")
    {
        $constants= static::toArray();
        return implode($separator,$constants);
    }

    public static function get($code)
    {
        if (isset(static::_mappings()[$code]))
            return static::_mappings()[$code];

        throw new \Exception("Value Not Found");
    }

    public static function _mappings(){
        return [];
    }
}
