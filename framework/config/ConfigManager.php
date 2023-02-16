<?php // config manager functions

	namespace becwork\config;

	class ConfigManager {

		/*
		 * FUNCTION: value by name form config
		 * INPUT: value name
		 * RETURN: value 
		*/
		public function getValueByName($name) {

			global $configOBJ;

			//Get String form array
			$value = $configOBJ->config[$name];

			//Return value
			return $value;
		}
	}
?>