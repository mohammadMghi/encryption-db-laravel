<?php 

namespace WhiteStarCode\DbCipher\Crypto;

class KeyManager
{
    protected static $key = null;

    public static function set($key)
    {
        self::$key = $key; 
    }

    public static function get()
    {
        return [self::$key];
    }

    public static function clear()
    {
        self::$key = null;
    }
}