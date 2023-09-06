<?php // encryption function test class

    declare(strict_types=1);
    use PHPUnit\Framework\TestCase;
    use becwork\utils\CryptUtils;
    
    # link crypt utils class
    require_once("app/encryption/CryptUtils.php");

    final class CryptTest extends TestCase {

        // test base64 encode
        public function testBase64Encode(): void {
            $cryptUtils = new CryptUtils();

            $encode = $cryptUtils->genBase64("test");
            $this->assertEquals($encode, "dGVzdA==");
        }

        // test base64 decode
        public function testBase64Decode(): void {
            $cryptUtils = new CryptUtils();

            $decode = $cryptUtils->decodeBase64("dGVzdA==");
            $this->assertEquals($decode, "test");
        }

        // test AES-128-CBC encryption
        public function testAesEncryption(): void {
            $cryptUtils = new CryptUtils();

            // testing string
            $string = "test";

            // encrypt string
            $encrypted = $cryptUtils->encryptAES($string, "1234", "aes-128-cbc");

            // decrypt string
            $decrypted = $cryptUtils->decryptAES($encrypted, "1234", "aes-128-cbc");

            $this->assertEquals($decrypted, $string);
        }
    }
?>
