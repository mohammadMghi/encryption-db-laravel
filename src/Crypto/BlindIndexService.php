<?php

namespace WhiteStarCode\DbCipher\Crypto;

class BlindIndexService
{
    public static function make(string $plaintext): string
    { 
        [$key] = KeyManager::get();

        $raw = hash_hmac('sha256', $plaintext, $key, true);

        return bin2hex($raw);  
    }
}