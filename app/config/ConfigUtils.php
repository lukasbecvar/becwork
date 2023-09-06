<?php // methods for manipulate with config.php

	namespace becwork\config;

	use \becwork\config\PageConfig;

	class ConfigUtils {

		/*
		 * FUNCTION: value by name form config.php file
		 * INPUT: value name
		 * RETURN: config value 
		*/
		public function get_value($name): ?string {

			global $site_manager;

			// default value
			$value = null;

			// link config file
			require_once(__DIR__."./../../config.php");

			// init config instance
			$config_OBJ = new PageConfig();
			
			// get config value
			$value = $config_OBJ->config[$name];

			// check if value return valid
			if ($value === null) {

				// handle config error
				$site_manager->handle_error("error to get config value: ".$name." please check config file", 520);
			} else {
				return $value;
			}
		}
	}
?>
