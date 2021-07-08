<?php //Main page file index

	//Init framework
	require_once"../framework/config/ConfigManager.php";
	require_once"../framework/crypt/HashUtils.php";
	require_once"../framework/crypt/CryptUtils.php";
	require_once"../framework/utils/ResponseUtils.php";
	require_once"../framework/utils/FileUtils.php";
	require_once"../framework/utils/MainUtils.php";
	require_once"../framework/utils/StringUtils.php";
	require_once"../framework/utils/SessionUtils.php";
	require_once"../framework/utils/UrlUtils.php";
	require_once"../framework/utils/CookieUtils.php";
	require_once"../framework/utils/EscapeUtils.php";




	//Init ConfigManager array
	$pageConfig = new ConfigManager();

	//Init HashUtils array
	$hashUtils = new HashUtils();

	//Init CryptUtils array
	$cryptUtils = new CryptUtils();

	//Init ResponseUtils array
	$responseUtils = new ResponseUtils();

	//Init FileUtils array
	$fileUtils = new FileUtils();

	//Init MainUtils array
	$mainUtils = new MainUtils();

	//Init StringUtils array
	$stringUtils = new StringUtils();

	//Init SessionUtils array
	$sessionUtils = new SessionUtils();

	//Init UrlUtils array
	$urlUtils = new UrlUtils();

	//Init CookieUtils array
	$cookieUtils = new CookieUtils();

	//Init EscapeUtils array
	$escapeUtils = new EscapeUtils();








	//Set default encoding
	header('Content-type: text/html; charset='.$pageConfig->getValueByName('encoding'));

	//Check if maintenance mode is enabled
	if ($pageConfig->getValueByName("maintenance") == "enable") {
		include_once"../site/errors/Maintenance.php";
	} else {

		//Include main page file
		include_once"../site/Main.php";
	}
?>

