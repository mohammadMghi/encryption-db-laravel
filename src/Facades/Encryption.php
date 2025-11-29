<?php

namespace WhiteStarCode\DbCipher\Facades;

use Illuminate\Support\Facades\Facade;

class Encryption extends Facade
{  
    protected static function getFacadeAccessor()
    {
        return 'DbCipher';
    }
}
