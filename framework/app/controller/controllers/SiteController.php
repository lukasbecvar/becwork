<?php // Example app controller

    namespace becwork\controller;

	class SiteController {

        // get maintenance mode value
        public function ifMaintenance() {

            global $pageConfig;

            // check if maintenance enabled
            if (($pageConfig->getValueByName('maintenance') == true)) {
                return true;
            } else {
                return false;
            }
        }

        // get http host url
        public function getHTTPhost() {
            return $_SERVER['HTTP_HOST'];
        }

        // redirect to error page
        public function redirectError($error) {

            // redirct loaction header
            header("location: ErrorHandlerer.php?code=$error");
        }
	}
?>