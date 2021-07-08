<?php //The main crypt utils

    class CryptUtils {

        public function genBase64($string) {
            return base64_encode($string);
        }

        public function decodeBase64($base64) {
            return base64_decode($base64);
        }
    }
?>