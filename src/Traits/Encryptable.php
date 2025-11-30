<?php 

namespace WhiteStarCode\DbCipher\Traits;

use WhiteStarCode\DbCipher\Crypto\KeyManager;
use WhiteStarCode\DbCipher\Facades\Encryption;

trait Encryptable
{
    public function setAttribute($key,$value)
    { 
        if (in_array($key , $this->encryptable)) {
            [$password , $salt] = KeyManager::get();

            $value = Encryption::encrypt($value,$password,$salt);
        }
        
        return parent::setAttribute($key,$value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key , $this->encryptable))
        {
            [$password , $salt] = KeyManager::get();

            return Encryption::decrypt($value,$password,$salt);
        }

        return $value;
    }

    public function setEncryptable($chiperPass,$salt)
    {
        $this->chiperPass = $chiperPass;
        $this->salt = $salt;
    }
}