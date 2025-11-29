<?php

namespace WhiteStarCode\DbCipher;

use Illuminate\Support\ServiceProvider;

class DbCipherServiceProvider extends ServiceProvider
{
    public function register()
    { 
        $this->app->bind('DbCipher', function(){
            return $this->app->make('WhiteStarCode\DbCipher\EncryptionService');
        });
    }

    public function boot()
    {
        
    }
}