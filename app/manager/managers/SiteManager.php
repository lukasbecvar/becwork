<?php // main site manager

    namespace becwork\managers;

	class SiteManager {

        // check if loaded url is valid
        public function isValidUrl(): bool {

            global $config;

            // default state
            $state = false;

            // get host url
            $url = $this->getHTTPhost();

            // check if url valid
            if ($url == $config->getValue("url")) {
                $state = true;
            }

            return $state;
        }

        // check if ssl running valid
        public function checkSSL(): bool {

            global $config, $mainUtils;

            // default state
            $state = true;

            // check if only https enabled
            if ($config->getValue("https")) {

                if (!$mainUtils->isSSL()) {
                    $state = false;
                }
            }

            return $state;
        }

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

            global $config;

            // send response code
            http_response_code($code);

            // check if error log enabled
            if ($config->getValue("error-log")) {

                // budil error msg
                $error_msg = "code: ".$code.", ".$msg."\n";

                // log to error.log
                error_log($error_msg, 3, __DIR__."../../../../error.log");
            }
            

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
