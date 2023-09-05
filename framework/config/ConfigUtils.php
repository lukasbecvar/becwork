<?php // config functions utils

	namespace becwork\config;

	class ConfigUtils {

		/*
		 * FUNCTION: value by name form config
		 * INPUT: value name
		 * RETURN: value 
		*/
		public function getValue($name) {

			global $siteManager;

			// link config file
			require_once(__DIR__."./../../config.php");

			// init config instance
			$config = new \becwork\config\PageConfig();
			
			// get config value
			$value = $config->config[$name];

			// check if value return valid
			if ($value === null) {
				$siteManager->handleError("error to get config value: ".$name." please check config file", 520);
			} else {
				return $value;
			}
		}
	}
?>