<?php 

namespace WhiteStarCode\DbCipher\Crypto;

class KeyGenerator
{   
    public static function generateKey(string $password): string
    {
        $salt = random_bytes(SODIUM_CRYPTO_PWHASH_SALTBYTES); 

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