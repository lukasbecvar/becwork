<?php // page file index
	
	// init framework /////////////////////////////////////////////////////////
	require_once("../framework/config/ConfigManager.php");
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

	// init controller system
	require_once("../framework/app/controller/ControllerManager.php");

	// init objects
	$responseUtils = new becwork\utils\ResponseUtils();
	$sessionUtils = new becwork\utils\SessionUtils();
	$stringUtils = new becwork\utils\StringUtils();
	$cookieUtils = new becwork\utils\CookieUtils();
	$escapeUtils = new becwork\utils\EscapeUtils();
	$mysqlUtils = new becwork\utils\MysqlUtils();
	$pageConfig = new becwork\config\ConfigManager();
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
		if ($pageConfig->getValueByName("dev-mode") == true) {
			die(include_once("../site/errors/VendorNotFound.php"));
		} else {
			die(include_once("../site/errors/Maintenance.php"));
		}
	} 
	
	/////////////////////////////////////////////////////////////////////////////////////////////


	// set default encoding
	header('Content-type: text/html; charset='.$pageConfig->getValueByName('encoding'));

	// init whoops for error headling
	if ($pageConfig->getValueByName("dev-mode") == true) {
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}

	// check if page is in maintenance mode
	if($siteController->ifMaintenance()) {
		include_once("../site/errors/Maintenance.php");
	} else { 
		
		// check if url-check is enabled
		if ($pageConfig->getValueByName("url-check")) {

			// check if page loaded with valid url (only on if url = localhost)
			if (($siteController->getHTTPhost() != $pageConfig->getValueByName("url")) && $siteController->getHTTPhost() != "localhost") {
				$urlUtils->redirect("ErrorHandlerer.php?code=400");
			}
		}

		// check if page running on https (only on if url = localhost)
		if ($pageConfig->getValueByName("https") == true && !$mainUtils->isSSL() && $siteController->getHTTPhost() != "localhost") {
			$urlUtils->redirect("ErrorHandlerer.php?code=400");
		} 
			
		// include main page file
		else {
			include_once("../site/Main.php");
		}
	}
?>

