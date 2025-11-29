<?php 

namespace WhiteStarCode\DbCipher\Crypto;

use RuntimeException;


class KeyGenerator
{   
    public static function generateKey(string $password, string $base64salt): string
    {
        $salt = base64_decode($base64salt);
        
        if($salt === false) {
            throw new RuntimeException('Invalid salt');
        }

        $key = sodium_crypto_pwhash(
            32,
            $password,
            $salt,
            SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
            SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE,
            SODIUM_CRYPTO_PWHASH_ALG_ARGON2ID13
        );

        return $key;
    }
}