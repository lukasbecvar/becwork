<?php // main site manager

    namespace becwork\managers;

	class SiteManager {

        // check if loaded url is valid
        public function is_valid_url(): bool {

            global $config;

            // default state
            $state = false;

            // get host url
            $url = $this->get_http_host();

            // check if url valid
            if ($url == $config->get_value("url")) {
                $state = true;
            }

            return $state;
        }

        // check if ssl running valid
        public function check_ssl(): bool {

            global $config, $main_utils;

            // default state
            $state = true;

            // check if only https enabled
            if ($config->get_value("https")) {

                if (!$main_utils->is_ssl()) {
                    $state = false;
                }
            }

            return $state;
        }

        // get maintenance mode value
        public function is_maintenance(): bool {

            global $config;

            // default state value
            $state = false;

            // check if maintenance enabled
            if (($config->get_value('maintenance') == true)) {
                $state = true;
            }

            return $state;
        }

        // get http host url
        public function get_http_host(): string {
            $http_host = $_SERVER['HTTP_HOST'];
            return $http_host;
        }

        // get query string by name
        public function get_query_string($query): ?string {
            
            global $escape_utils;

            // check if query is empty
            if (empty($_GET[$query])) {
                $output = null;
            } else {

                // escape query
                $output = $escape_utils->special_charsh_strip($_GET[$query]);
            }

            // return final query value
            return $output;
        }

        // check if page in dev mode
        public function is_dev_mode(): bool {

            global $config;

            // default state output
			$state = false;

            // check if dev mode enabled
            if ($config->get_value("dev-mode") == true) {
                $state = true;
            }
            
            return $state;
        }

        // redirect to error page
        public function redirect_error($error): void {

            // redirct loaction header
            header("location: error.php?code=$error");
        }

        // handle error msg & code
        public function handle_error($msg, $code): void {

            global $config;

            // send response code
            http_response_code($code);

            // check if error log enabled
            if ($config->get_value("error-log")) {

                // budil error msg
                $error_msg = "code: ".$code.", ".$msg."\n";

                // log to error.log
                error_log($error_msg, 3, __DIR__."../../../../error.log");
            }
            

            // check if site enabled dev-mode
            if ($this->is_dev_mode()) {
                die("[DEV-MODE]: ".$msg);
            } else {
                $this->redirect_error($code);
            }
        }
    }
?>
