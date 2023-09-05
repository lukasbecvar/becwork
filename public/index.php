<?php // page file index
	
	// init framework /////////////////////////////////////////////////////////
	require_once("../framework/config/ConfigUtils.php");
	require_once("../framework/crypt/HashUtils.php");
	require_once("../framework/crypt/CryptUtils.php");
	require_once("../framework/utils/ResponseUtils.php");
	require_once("../framework/utils/FileUtils.php");
	require_once("../framework/utils/MainUtils.php");
	require_once("../framework/utils/StringUtils.php");
	require_once("../framework/utils/SessionUtils.php");
	require_once("../framework/utils/UrlUtils.php");
	require_once("../framework/utils/CookieUtils.php");
	require_once("../framework/utils/EscapeUtils.php");
	require_once("../framework/mysql/MysqlUtils.php");

	// init app managers
	require_once("../framework/app/manager/ManagerList.php");
	
	// init config utils
	$config = new becwork\config\ConfigUtils();
	
	// init mysql data
	$database_ip = $config->getValue("mysql-address");
	$database_name = $config->getValue("mysql-database");
	$database_username = $config->getValue("mysql-username");
	$database_password = $config->getValue("mysql-password");

	// init mysql instance
	$mysql = new becwork\utils\MysqlUtils($database_ip, $database_name, $database_username, $database_password);

	// init objects
	$responseUtils = new becwork\utils\ResponseUtils();
	$sessionUtils = new becwork\utils\SessionUtils();
	$stringUtils = new becwork\utils\StringUtils();
	$cookieUtils = new becwork\utils\CookieUtils();
	$escapeUtils = new becwork\utils\EscapeUtils();
	$cryptUtils = new becwork\utils\CryptUtils();
	$hashUtils = new becwork\utils\HashUtils();
	$fileUtils = new becwork\utils\FileUtils();
	$mainUtils = new becwork\utils\MainUtils();
	$urlUtils = new becwork\utils\UrlUtils();
	///////////////////////////////////////////////////////////////////////////

	// composer vendor
	if(file_exists('../vendor/autoload.php')) {
		require_once('../vendor/autoload.php');	
	} else {
		
		// redirect to error page if composer components is not installed
		if ($config->getValue("dev-mode") == true) {
			die(include_once("../site/errors/VendorNotFound.php"));
		} else {
			die(include_once("../site/errors/Maintenance.php"));
		}
	} 
	
	/////////////////////////////////////////////////////////////////////////////////////////////

	// set default encoding
	header('Content-type: text/html; charset='.$config->getValue('encoding'));

	// init whoops for error headling
	if ($config->getValue("dev-mode") == true) {
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}

	// check if page is in maintenance mode
	if($siteManager->ifMaintenance()) {
		include_once("../site/errors/Maintenance.php");
	} else { 
		
		// check if url-check is enabled
		if ($config->getValue("url-check")) {

			// check if page loaded with valid url (only on if url = localhost)
			if (($siteManager->getHTTPhost() != $config->getValue("url")) && $siteManager->getHTTPhost() != "localhost") {
				$urlUtils->redirect("error.php?code=400");
			}
		}

		// check if page running on https (only on if url = localhost)
		if ($config->getValue("https") == true && !$mainUtils->isSSL() && $siteManager->getHTTPhost() != "localhost") {
			$urlUtils->redirect("error.php?code=400");
		} 
			
		// include main page file
		else {
			include_once("../site/Main.php");
		}
	}
?>

