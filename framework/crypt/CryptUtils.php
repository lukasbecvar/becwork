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
          * AES128 image encrypt
          * Input: Image file, encrypt key
          * Return: encrypted image
        */
        public function encryptImageAES($image, $key) {
            return openssl_encrypt($image, "aes-128-cbc", $key);
        }


        /*
          * AES128 image decrypt
          * Input: Image file, decrypt key
          * Return: decrypted image
        */
        public function decryptImageAES($encryptedImage, $key) {
            return openssl_decrypt($encryptedImage, "aes-128-cbc", $key);
        }
    }
?>