<?php //The main crypt utils

    class CryptUtils {

        /*
          * Base64 gen function
          * Input: String or file (img, etc.)
          * Return: Base64 code
        */
        public function genBase64($string) {
            return base64_encode($string);
        }


        /*
          * Base64 decode function
          * Input: base64 code
          * Return: string or file
        */
        public function decodeBase64($base64) {
            return base64_decode($base64);
        }


        /*
          * AES128 AES encrypt
          * Input: string or file, encrypt key
          * Return: encrypted string
        */
        public function encryptAES($string, $key) {
            return openssl_encrypt($string, "aes-128-cbc", $key);
        }


        /*
          * AES128 AES decrypt
          * Input: string or file, decrypt key
          * Return: decrypted string
        */
        public function decrypAES($encrypted, $key) {
            return openssl_decrypt($encrypted, "aes-128-cbc", $key);
        }
    }
?>