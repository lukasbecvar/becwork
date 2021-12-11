<?php //Main utils class

    class MainUtils {
 

        /*
          * The function for get php server infromation
          * Usage like echo drawPhpInformation()
          * Returned phpinfo page
        */
        public function drawPhpInformation() {
            return phpinfo();
        }


        /*
          * The function for get date by format
          * Usage like drawData('m/d/Y h:i:s a')
          * Input time format
          * Return actual time in your format
        */
        public function drawData($format) {
            return date($format);
        }


        /*
          * The function for get user remote adress
          * Usage like $ip = getRemoteAdress()
          * Return remote adress
        */
        public function getRemoteAdress() {
            return $_SERVER['REMOTE_ADDR'];
        }



        /*
          * The function for redirect user
          * Usage like redirect("home.php")
          * Input page
        */
        public static function getRootDoc() {
            return $_SERVER['DOCUMENT_ROOT'];
        }


        /*
          * The function for check if is lampp server
          * Usage like $lampp = isLampp();
          * Return true or false
        */
        public function isLampp() {
            if ($this->getRootDoc() == "/opt/lampp/htdocs") {
                return true;
            } else {
                return false;
            }
        }


        /*
          * The function for get protocol
          * Usage like $protocol = getProtocol();
          * Return protocol (http, https)
        */
        public function getProtocol() {
            if (!empty($_SERVER['HTTPS'])) {
                return "https://";
            } else {
                return "http://";
            }
        }


        /*
          * The function for print array
          * Usage like drawArray($array)
          * Input array
        */
        public function drawArray($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    }
?>
