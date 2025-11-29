<?php

namespace WhiteStarCode\DbCipher;

use WhiteStarCode\DbCipher\Crypto\KeyGenerator;

class EncryptionService
{
    public function encrypt($plaintext,$password,$salt): string
    {   
        $key = KeyGenerator::generateKey($password,$salt);
      
        if ($plaintext === null) return null;
        
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
        $cipher = sodium_crypto_secretbox($plaintext, $nonce, $key);
        return base64_encode($nonce . $cipher); 
    }

    public function decrypt($ciphertext,$password,$salt): string
    {
         if ($ciphertext === null) return null;
        $decoded = base64_decode($ciphertext, true);
        if ($decoded === false) return null;
        $nonceLen = SODIUM_CRYPTO_SECRETBOX_NONCEBYTES;
        $nonce = substr($decoded, 0, $nonceLen);
        $cipher = substr($decoded, $nonceLen);

        $key = KeyGenerator::generateKey($password,$salt);

        $plain = sodium_crypto_secretbox_open($cipher, $nonce, $key);
        if ($plain === false) {
            return null;
        }
        return $plain;
    }
}
