<?php

namespace Vendor\Package\Tests;

use Orchestra\Testbench\TestCase as BaseTest;
use WhiteStarCode\DbCipher\DbCipherServiceProvider;

class TestCase extends BaseTest
{
    protected function getPackageProviders($app)
    {
        return [
            DbCipherServiceProvider::class,
        ];
    }
}
