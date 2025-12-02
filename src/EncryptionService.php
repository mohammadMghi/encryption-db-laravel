<?php

namespace WhiteStarCode\DbCipher;

use WhiteStarCode\DbCipher\Crypto\KeyGenerator;

class EncryptionService
{
    public function encrypt($plaintext,$key): string
    {   
        if ($this->isBase64($key)) {
            $key = base64_decode($key);
        }
 
        if ($plaintext === null) return null;
        
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $cipher = sodium_crypto_secretbox($plaintext, $nonce, $key);
        return base64_encode($nonce . $cipher); 
    }

    public function decrypt($ciphertext,$key): string
    { 
        if ($this->isBase64($key)) {
            $key = base64_decode($key);
        }
 
        if ($ciphertext === null) return null;
        $decoded = base64_decode($ciphertext, true);
        if ($decoded === false) return null;
        $nonceLen = SODIUM_CRYPTO_SECRETBOX_NONCEBYTES;
        $nonce = substr($decoded, 0, $nonceLen);
        $cipher = substr($decoded, $nonceLen);

        $plain = sodium_crypto_secretbox_open($cipher, $nonce, $key);
        if ($plain === false) {
            return null;
        }
        return $plain;
    }

    function isBase64(string $str): bool
    {
        if ($str === '') return false;

        $decoded = base64_decode($str, true); // strict = true
        if ($decoded === false) return false;
 
        return base64_encode($decoded) === $str;
    }
}
