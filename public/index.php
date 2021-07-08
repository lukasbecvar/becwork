<?php



	//Init framework
	require_once"../framework/config/ConfigManager.php";
	require_once"../framework/crypt/HashUtils.php";
	require_once"../framework/crypt/CryptUtils.php";

	//Init ConfigManager array
	$pageConfig = new ConfigManager();

	//Init HashUtils array
	$hashUtils = new HashUtils();

	//Init CryptUtils array
	$cryptUtils = new CryptUtils();


	//Check if maintenance mode is enabled
	if ($pageConfig->getValueByName("maintenance") == "enable") {
		include_once"../site/errors/Maintenance.php";
	} else {

		//Include main page file
		include_once"../site/Main.php";
	}
?>

