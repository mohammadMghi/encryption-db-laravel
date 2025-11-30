<?php 

namespace WhiteStarCode\DbCipher\Crypto;

use RuntimeException;


class KeyGenerator
{   
    public static function generateKey(string $password, string $salt): string
    {
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