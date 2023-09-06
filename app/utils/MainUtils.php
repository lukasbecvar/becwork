<?php // main app utils
    
    namespace becwork\utils;

    class MainUtils { 

        /*
          * FUNCTION: get php server infromation
          * USAGE echo drawPhpInformation()
          * RETURN: phpinfo page
        */
        public function drawPhpInformation(): void {
            phpinfo();
        }

        /*
          * FUNCTION: date by format
          * USAGE drawData('m/d/Y h:i:s a')
          * INPUT: time format
          * RETURN: actual time in your format
        */
        public function drawData($format): ?string {
            return date($format);
        }

        /*
          * FUNCTION: get user remote adress
          * USAGE $ip = getRemoteAdress()
          * RETURN: remote adress
        */
        public function getRemoteAdress(): ?string {
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
        public static function getRootDoc(): ?string {
            return $_SERVER['DOCUMENT_ROOT'];
        }

        /*
          * FUNCTION: get running protocol
          * USAGE $protocol = getProtocol();
          * RETURN: protocol (http, https)
        */
        public function getProtocol(): string {

            // default protocol
            $protocol = "http://";

            // check if https
            if (!empty($_SERVER['HTTPS'])) {
                $protocol = "https://";
            } 

            return $protocol;
        }

        /*
          * FUNCTION: print formated array
          * USAGE drawArray($array)
          * INPUT: array
        */
        public function drawArray($array): void {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
 
        /*
          * display php errors
        */
        public function drawErrors(): void {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);         
        }

        /*
          FUNCTION: Determine if this is a secure HTTPS connection
          RETURN: bool True if it is a secure HTTPS connection, otherwise false.
        */
        public function isSSL(): bool {

            // default state
            $state = false;

            // check if https
            if (isset($_SERVER['HTTPS'])) {
                if ($_SERVER['HTTPS'] == 1) {
                    $state = true;
                } elseif ($_SERVER['HTTPS'] == 'on') {
                    $state = true;
                }
            }
        
            return $state;
        }
    }
?>
