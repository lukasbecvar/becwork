<?php // page file index

	// init utils /////////////////////////////////////////////////////////////
	require_once("../app/config/ConfigUtils.php");
	require_once("../app/encryption/HashUtils.php");
	require_once("../app/encryption/CryptUtils.php");
	require_once("../app/utils/ResponseUtils.php");
	require_once("../app/utils/JsonUtils.php");
	require_once("../app/utils/MainUtils.php");
	require_once("../app/utils/StringUtils.php");
	require_once("../app/utils/SessionUtils.php");
	require_once("../app/utils/UrlUtils.php");
	require_once("../app/utils/CookieUtils.php");
	require_once("../app/utils/EscapeUtils.php");
	require_once("../app/database/MysqlUtils.php");

	// init app managers
	require_once("../app/manager/ManagerListener.php");
	
	// init config util
	$config = new becwork\config\ConfigUtils();
	
	// get mysql data
	$database_ip = $config->getValue("db-host-ip");
	$database_name = $config->getValue("db-database");
	$database_username = $config->getValue("db-username");
	$database_password = $config->getValue("db-password");

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
	$jsonUtils = new becwork\utils\JsonUtils();
	$mainUtils = new becwork\utils\MainUtils();
	$urlUtils = new becwork\utils\UrlUtils();
	///////////////////////////////////////////////////////////////////////////

	// check if composer installed
	if(file_exists('../vendor/autoload.php')) {
		require_once('../vendor/autoload.php');	
	} else {
		
		// handle error redirect to error page if composer components is not installed
		$siteManager->handleError("vendor directory not found, plese run composer install", 520);
	} 

	// set default encoding
	header('Content-type: text/html; charset='.$config->getValue('encoding'));

	// init whoops for error headling
	if ($siteManager->isSiteDevMode() == true) {
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

			// check if page loaded with valid url 
			if (!$siteManager->isValidUrl()) {

				// handle invalid url error
				$siteManager->handleError("invalid url load, plese check [url-check, url]: values in config.php", 400);
			}
		}

		// check if page running on https
		if (!$siteManager->checkSSL()) {

			// handle invalid https error
			$siteManager->handleError("this site can run only on https protocol, check your url in browser or config.php", 400);
		} 
			
		// init main router
		else {
			include_once("../site/Router.php");
		}
	}
?>

