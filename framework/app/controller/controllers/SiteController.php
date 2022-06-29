<?php //The Example app controller

	class SiteController {

        //Get true or false for maintenance mode
        public function ifMaintenance() {

            global $pageConfig;

            if (($pageConfig->getValueByName('maintenance') == "enabled")) {
                return true;
            } else {
                return false;
            }
        }

        //Get Http host aka domain name
        public function getHTTPhost() {
            return $_SERVER['HTTP_HOST'];
        }
	}
?>