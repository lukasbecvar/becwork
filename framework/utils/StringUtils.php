<?php 

    namespace becwork\utils;
    
    class StringUtils { 

        /*
          * FUNCTION: generate random lower string
          * USAGE: echo genRandomStringLower(20)
          * INPUT string lenght
          * RETURN: random string in lowercase
        */
        public function genRandomStringLower($lenght) {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }

        /*
          * FUNCTION: generate random uper string
          * USAGE: echo genRandomStringUper(20)
          * INPUT string lenght
          * RETURN: random string in upercase
        */
        public function genRandomStringUper($lenght) {
            $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }

        /*
          * FUNCTION: generate random string
          * USAGE: echo genRandomStringAll(20)
          * INPUT string lenght
          * RETURN: random string
        */
        public function genRandomStringAll($lenght) {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }

        /*
          * FUNCTION: generate random special chars
          * USAGE: echo genSpecialChars(20)
          * INPUT string lenght
          * RETURN: random special chars type string
        */
        public function genSpecialChars($lenght) {
            $permitted_chars = "!#$%&()*+,-./:;<=>?@[\]^_`{|}~";
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }

        /*
          * FUNCTION: generate random characters
          * USAGE: echo genCombinated(20)
          * INPUT string lenght
          * RETURN: random chars type string
        */
        public static function genCombinated($lenght) {
            $permitted_chars = "0123456789!#$%&()*+,-./:;<=>?@[\]^_`{|}~0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }

        /*
          * FUNCTION: generate random numbers
          * USAGE: echo genNumbrGenerator(20)
          * INPUT string lenght
          * RETURN: random numbers type string
        */
        public static function genNumbrGenerator($lenght) {
            $permitted_chars = "0123456789";
            $generated = substr(str_shuffle($permitted_chars), 0, $lenght);
            return $generated;
        }
    }
?>
