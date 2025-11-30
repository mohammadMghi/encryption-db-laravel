<?php 

namespace WhiteStarCode\DbCipher\Traits;

use WhiteStarCode\DbCipher\Crypto\KeyManager;
use WhiteStarCode\DbCipher\Facades\Encryption;

trait Encryptable
{
    protected $encryptable = []; 

    public function setAttribute($key,$value)
    {
        if (in_array($key , $this->encryptable)) {
            [$key , $salt] = KeyManager::get();

            $value = Encryption::encrypt($value,$key,$salt);
        }

        return parent::setAttribute($key,$value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key , $this->encryptable))
        {
            [$key , $salt] = KeyManager::get();

            return Encryption::decrypt($value,$key,$salt);
        }

        return $value;
    }

    public function setEncryptable($chiperPass,$salt)
    {
        $this->chiperPass = $chiperPass;
        $this->salt = $salt;
    }
}