<?php // hash function test class

    declare(strict_types=1);
    use PHPUnit\Framework\TestCase;
    use becwork\utils\HashUtils;

    # link hash utils class
    require_once("app/encryption/HashUtils.php");

    final class HashTest extends TestCase {

        // test hash validation (test with invalid hash)
        public function testHashValidateFlase() {
            $hashUtils = new HashUtils();

            $state = $hashUtils->hashValidate("test", "shity shity");
            $this->assertEquals($state, false);
        }

        // test hash validation (test with valid hash, bcrypt cost 10)
        public function testHashValidateTrue() {
            $hashUtils = new HashUtils();

            $state = $hashUtils->hashValidate("test", "$2y$10$3Dlhb9Ju6/o0mec6JOy00OX.YzrYjczWf7bDh172SejdAVtQWFv2O");
            $this->assertEquals($state, true);
        }

        // test bcrypt hash
        public function testBcrypt(): void {
            $hashUtils = new HashUtils();

            $hash = $hashUtils->genBcrypt("test", 10);
            $this->assertEquals($hash, crypt('test', $hash));
        }

        // test sha1 hash
        public function testSHA1(): void {
            $hashUtils = new HashUtils();

            $hash = $hashUtils->genSHA1("test");
            $this->assertEquals($hash, "*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29");
        }

        // test md5
        public function testMD5(): void {
            $hashUtils = new HashUtils();

            $hash = $hashUtils->hashMD5("test");
            $this->assertEquals($hash, "098f6bcd4621d373cade4e832627b4f6");
        }

        // test sha 256
        public function testSHA256(): void {
            $hashUtils = new HashUtils();

            $hash = $hashUtils->genSHA256("test");
            $this->assertEquals($hash, "9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08");
        }

        // test custom hash (with md4)
        public function testCustomHash(): void {
            $hashUtils = new HashUtils();

            $hash = $hashUtils->customHash("test", "md4");
            $this->assertEquals($hash, "db346d691d7acc4dc2625db19f9e3f52");
        }
    }
?>
