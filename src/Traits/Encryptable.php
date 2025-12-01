<?php 

namespace WhiteStarCode\DbCipher\Traits;

use WhiteStarCode\DbCipher\Crypto\KeyManager;
use WhiteStarCode\DbCipher\Facades\Encryption;

trait Encryptable
{
    public function setAttribute($key,$value)
    { 
        if (in_array($key , $this->encryptable)) {
            [$chiper_key] = KeyManager::get();
            $value = Encryption::encrypt($value,$chiper_key);
        }
        
        return parent::setAttribute($key,$value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
    
        if (in_array($key , $this->encryptable))
        {
            [$key] = KeyManager::get();

            return Encryption::decrypt($value,$key);
        }

        return $value;
    }
}