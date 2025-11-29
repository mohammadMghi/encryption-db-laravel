<?php 

namespace WhiteStarCode\DbCipher\Traits;

use WhiteStarCode\DbCipher\Facades\Encryption;

trait Encryptable
{
    protected $encryptable = [];

    public function setAttribute($key,$value)
    {
        if (in_array($key , $this->encryptable)) {
            $value = Encryption::encrypt($value);
        }

        return parent::setAttribute($key,$value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key , $this->encryptable))
        {
            return Encryption::decrypt($value);
        }

        return $value;
    }

    public function setEncryptable($password,$salt)
    {

    }
}