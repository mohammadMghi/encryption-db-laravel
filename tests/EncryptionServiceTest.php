<?php 

namespace Vendor\Package\Tests;

use WhiteStarCode\DbCipher\Crypto\KeyGenerator;
use WhiteStarCode\DbCipher\EncryptionService; 

class EncryptionServiceTest extends TestCase
{
    public function test_make_returns_string_with_base64_ecrypt_func()
    {
        $crypt = new EncryptionService();

        $plaintext = "abc";

        $key = KeyGenerator::generateKey("abc");
       
        $key = base64_encode($key);

        $result = $crypt->encrypt($plaintext,$key);
    
        $this->assertIsString($result);
    }

    public function test_make_returns_string_without_base64_ecrypt_func()
    {
        $crypt = new EncryptionService();

        $plaintext = "abc";

        $key = KeyGenerator::generateKey("abc");

        $result = $crypt->encrypt($plaintext,$key);
    
        $this->assertIsString($result);
    }


    public function test_make_returns_string_with_base64_decrypt_func()
    {
        $crypt = new EncryptionService();

        $plaintext = "abc";

        $key = KeyGenerator::generateKey("abc");
       
        $key = base64_encode($key);

        $plaintext = "HelloWorld";

        $ecrypted = $crypt->encrypt($plaintext,$key);
 
        $result = $crypt->decrypt($ecrypted,$key);
    
        $this->assertIsString($result);
    } 


    public function test_make_returns_string_without_base64_decrypt_func()
    {
        $crypt = new EncryptionService();

        $plaintext = "abc";

        $key = KeyGenerator::generateKey("abc");
     
        $plaintext = "HelloWorld";

        $ecrypted = $crypt->encrypt($plaintext,$key);
 
        $result = $crypt->decrypt($ecrypted,$key);
    
        $this->assertIsString($result);
    } 
}