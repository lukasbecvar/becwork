<?php // methods for manipulate with config.php

	namespace becwork\config;

	use \becwork\config\PageConfig;

	class ConfigUtils {

		/*
		 * FUNCTION: value by name form config.php file
		 * INPUT: value name
		 * RETURN: config value 
		*/
		public function getValue($name): ?string {

			global $siteManager;

			// default value
			$value = null;

			// link config file
			require_once(__DIR__."./../../config.php");

			// init config instance
			$configOBJ = new PageConfig();
			
			// get config value
			$value = $configOBJ->config[$name];

			// check if value return valid
			if ($value === null) {

				// handle config error
				$siteManager->handleError("error to get config value: ".$name." please check config file", 520);
			} else {
				return $value;
			}
		}
	}
?>