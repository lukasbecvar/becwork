<?php 
    
    namespace becwork\utils;

    class MainUtils { 

        /*
          * FUNCTION: get php server infromation
          * USAGE echo drawPhpInformation()
          * RETURN: phpinfo page
        */
        public function drawPhpInformation() {
            return phpinfo();
        }

        /*
          * FUNCTION: date by format
          * USAGE drawData('m/d/Y h:i:s a')
          * INPUT: time format
          * RETURN: actual time in your format
        */
        public function drawData($format) {
            return date($format);
        }

        /*
          * FUNCTION: get user remote adress
          * USAGE $ip = getRemoteAdress()
          * RETURN: remote adress
        */
        public function getRemoteAdress() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $address = $_SERVER['HTTP_CLIENT_IP'];
      
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $address = $_SERVER['HTTP_X_FORWARDED_FOR'];

            } else {
                $address = $_SERVER['REMOTE_ADDR'];
            }
            
            return $address;
        }

        /*
          * FUNCTION: get document root
          * USAGE redirect("home.php")
        */
        public static function getRootDoc() {
            return $_SERVER['DOCUMENT_ROOT'];
        }

        /*
          * FUNCTION: check if is lampp server
          * USAGE $lampp = isLampp();
          * RETURN: true or false
        */
        public function isLampp() {
            if ($this->getRootDoc() == "/opt/lampp/htdocs") {
                return true;
            } else {
                return false;
            }
        }

        /*
          * FUNCTION: get running protocol
          * USAGE $protocol = getProtocol();
          * RETURN: protocol (http, https)
        */
        public function getProtocol() {
            if (!empty($_SERVER['HTTPS'])) {
                return "https://";
            } else {
                return "http://";
            }
        }

        /*
          * FUNCTION: print formated array
          * USAGE drawArray($array)
          * INPUT: array
        */
        public function drawArray($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

        /*
          * display php errors
        */
        public function drawErrors() {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);         
        }

        /*
          FUNCTION: Determine if this is a secure HTTPS connection
          RETURN: bool True if it is a secure HTTPS connection, otherwise false.
        */
        public function isSSL() {
            if (isset($_SERVER['HTTPS'])) {
                if ($_SERVER['HTTPS'] == 1) {
                    return true;
                } elseif ($_SERVER['HTTPS'] == 'on') {
                    return true;
                }
            }
        
            return false;
        }
    }
?>
