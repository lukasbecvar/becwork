<?php // main app utils
    
    namespace becwork\utils;

    class MainUtils { 

        /*
          * FUNCTION: get user remote adress
          * USAGE $ip = get_remote_adress()
          * RETURN: remote adress
        */
        public function get_remote_adress(): ?string {
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
        public static function get_root_doc(): ?string {
            $doc_root = $_SERVER['DOCUMENT_ROOT'];
            return $doc_root;
        }

        /*
          * FUNCTION: get running protocol
          * USAGE $protocol = get_protocol();
          * RETURN: protocol (http, https)
        */
        public function get_protocol(): string {

            // default protocol
            $protocol = "http://";

            // check if https
            if (!empty($_SERVER['HTTPS'])) {
                $protocol = "https://";
            } 

            return $protocol;
        }
 
        /*
          * display php errors
        */
        public function enable_errors(): void {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);         
        }

        /*
          FUNCTION: Determine if this is a secure HTTPS connection
          RETURN: bool True if it is a secure HTTPS connection, otherwise false.
        */
        public function is_ssl(): bool {

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
