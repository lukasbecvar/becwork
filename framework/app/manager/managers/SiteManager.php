<?php // main site actions manager

    namespace becwork\managers;

	class SiteManager {

        // get maintenance mode value
        public function ifMaintenance(): bool {

            global $config;

            // default state value
            $state = false;

            // check if maintenance enabled
            if (($config->getValue('maintenance') == true)) {
                $state = true;
            }

            return $state;
        }

        // get http host url
        public function getHTTPhost(): string {
            $http_host = $_SERVER['HTTP_HOST'];
            return $http_host;
        }

        // get query string by name
        public function getQueryString($query): ?string {
            
            global $escapeUtils;

            // check if query is empty
            if (empty($_GET[$query])) {
                $output = null;
            } else {

                // escape query
                $output = $escapeUtils->specialCharshStrip($_GET[$query]);
            }

            // return final query value
            return $output;
        }

        // check if page in dev mode
        public function isSiteDevMode(): bool {

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
        public function handleError($msg, $code): void {

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
        public function redirectError($error): void {

            // redirct loaction header
            header("location: error.php?code=$error");
        }
    }
?>
