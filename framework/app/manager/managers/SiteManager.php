<?php // main site actions manager

    namespace becwork\managers;

	class SiteManager {

        // get maintenance mode value
        public function ifMaintenance() {

            global $config;

            // check if maintenance enabled
            if (($config->getValue('maintenance') == true)) {
                return true;
            } else {
                return false;
            }
        }

        // get http host url
        public function getHTTPhost() {
            $http_host = $_SERVER['HTTP_HOST'];
            return $http_host;
        }

        // get query string by name
        public function getQueryString($query) {
            
            global $mysql;

            // check if query is empty
            if (empty($_GET[$query])) {
                $output = null;
            } else {

                // escape query
                $output = $mysql->escapeString($_GET[$query], true, true);
            }

            // return final query value
            return $output;
        }

        // check if page in dev mode
        public function isSiteDevMode() {

            global $config;

            // default state output
			$state = false;

            // check if dev mode enabled
            if ($config->getValue("dev-mode") == true) {
                $state = true;
            }
            
            return $state;
        }

        // handle error msg & code
        public function handleError($msg, $code) {

            // send response code
            http_response_code($code);

            // check if site enabled dev-mode
            if ($this->isSiteDevMode()) {
                die("[DEV-MODE]: ".$msg);
            } else {
                $this->redirectError($code);
            }
        }

        // redirect to error page
        public function redirectError($error) {

            // redirct loaction header
            header("location: error.php?code=$error");
        }
    }
?>
