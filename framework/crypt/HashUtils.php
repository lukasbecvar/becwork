<?php // hash function

    namespace becwork\utils;

    class HashUtils { 

        /*
          * FUNCTION: blowfish hash generate
          * USAGE: genBlowFish("plaintext")
          * Input text type string
          * RETURN: final hash type string
        */
        public function genBlowFish($plainText) {
            $hashFromat = "$2y$10$";
            $salt = "123sbrznvdzvchpj8z5p5k";
            $hashFromat_salt = $hashFromat.$salt;
            return crypt($plainText, $hashFromat_salt);
        }

        /*
          * FUNCTION: genSHA1 hash generate
          * USAGE: genSHA1("plaintext")
          * Input text type string
          * RETURN: final hash type string
        */
        public function genSHA1($plainText) {
            $hash = "*" . sha1(sha1($plainText, true));
            $hashFinal = strtoupper($hash);
            return $hashFinal;
        }

        /*
          * FUNCTION: hashMD5 hash generate
          * USAGE: hashMD5("plaintext")
          * Input text type string
          * RETURN: final hash type string
        */
        public function hashMD5($plainText) {
            $hashFinal= hash('md5', $plainText);
            return $hashFinal;
        }

        /*
          * FUNCTION: generate sha256 hash form string
          * USAGE: genSHA256("string");
          * INPUT: text in string
          * RETURN: final sha256 hash form string
        */
        public function genSHA256($string) {
            return hash('sha256', $string);
        }

        /*
          * FUNCTION: generate custom hash form string by name
          * USAGE: customhash("string", "sha1");
          * INPUT: text in string, hash name in string
          * RETURN: final hash form string
        */
        public function customhash($string, $hash) {
          return hash($hash, $string);
        }
    }
?>