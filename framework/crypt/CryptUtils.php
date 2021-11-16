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


        public function sign($message, $key) {
            return hash_hmac('sha256', $message, $key) . $message;
        }
        

        public function verify($bundle, $key) {
            return hash_equals(
              hash_hmac('sha256', mb_substr($bundle, 64, null, '8bit'), $key),
              mb_substr($bundle, 0, 64, '8bit')
            );
        }
        

        public function getKey($password, $keysize = 16) {
            return hash_pbkdf2('sha256',$password,'some_token',100000,$keysize,true);
        }
        

        public function encrypt($message, $password) {
            $iv = random_bytes(16);
            $key = $this->getKey($password);
            $result = $this->sign(openssl_encrypt($message,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$iv), $key);
            return bin2hex($iv).bin2hex($result);
        }

        
        public function decrypt($hash, $password) {
            $iv = hex2bin(substr($hash, 0, 32));
            $data = hex2bin(substr($hash, 32));
            $key = $this->getKey($password);
            if (!$this->verify($data, $key)) {
              return null;
            }
            return openssl_decrypt(mb_substr($data, 64, null, '8bit'),'aes-256-ctr',$key,OPENSSL_RAW_DATA,$iv);
        }
    }
?>