<?php 

namespace Vendor\Package\Tests;

use WhiteStarCode\DbCipher\Crypto\KeyGenerator;
 

class KeyGeneratorTest extends TestCase
{
    public function test_make_a_returns_string()
    {
        $result = KeyGenerator::generateKey("abc");

        $this->assertIsString($result);
    }

    public function test_make_returns_different_key_for_each_call()
    {
        $firstResult = KeyGenerator::generateKey("abc");
        $secondResult = KeyGenerator::generateKey("abc");
    
        $this->assertNotEquals($firstResult, $secondResult);
    }

    public function test_generateKey_throws_exception_for_invalid_password()
    {
        $this->expectException(\TypeError::class);
        KeyGenerator::generateKey(null);  
    }
}