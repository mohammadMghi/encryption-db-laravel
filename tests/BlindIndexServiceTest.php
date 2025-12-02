<?php

namespace Vendor\Package\Tests;

use WhiteStarCode\DbCipher\Crypto\BlindIndexService;

class BlindIndexServiceTest extends TestCase
{
    public function test_make_a_returns_string()
    {
        $plaintext= "HelloWorld";

        $result = BlindIndexService::make($plaintext);

        $this->assertIsString($result);
    }

    public function test_make_returns_deterministic_output()
    {
        $plaintext= "HelloWorld";

        $firstResult = BlindIndexService::make($plaintext);

        $secondResult = BlindIndexService::make($plaintext);

        $this->assertEquals($firstResult, $secondResult);
    }
}