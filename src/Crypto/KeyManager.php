<?php 

namespace WhiteStarCode\DbCipher\Crypto;

class KeyManager
{
    protected static $key = null;
    protected static $salt = null;

    public static function set($key, $salt)
    {
        self::$key = $key;
        self::$salt = $salt;
    }

    public static function get()
    {
        return [self::$key, self::$salt];
    }
}