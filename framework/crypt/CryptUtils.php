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
    }
?>