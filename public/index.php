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
	$database_ip = $config->get_value("db-host-ip");
	$database_name = $config->get_value("db-database");
	$database_username = $config->get_value("db-username");
	$database_password = $config->get_value("db-password");

	// init mysql instance
	$mysql = new becwork\utils\MysqlUtils($database_ip, $database_name, $database_username, $database_password);

	// init objects
	$response_utils = new becwork\utils\ResponseUtils();
	$session_utils = new becwork\utils\SessionUtils();
	$string_utils = new becwork\utils\StringUtils();
	$cookie_utils = new becwork\utils\CookieUtils();
	$escape_utils = new becwork\utils\EscapeUtils();
	$crypt_utils = new becwork\utils\CryptUtils();
	$hash_utils = new becwork\utils\HashUtils();
	$json_utils = new becwork\utils\JsonUtils();
	$main_utils = new becwork\utils\MainUtils();
	$url_utils = new becwork\utils\UrlUtils();
	///////////////////////////////////////////////////////////////////////////

	// check if composer installed
	if(file_exists('../vendor/autoload.php')) {
		require_once('../vendor/autoload.php');	
	} else {
		
		// handle error redirect to error page if composer components is not installed
		$site_manager->handle_error("vendor directory not found, plese run composer install", 520);
	} 

	// set default encoding
	header('Content-type: text/html; charset='.$config->get_value('encoding'));

	// init whoops for error headling
	if ($site_manager->is_dev_mode() == true) {
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}

	// check if page is in maintenance mode
	if($site_manager->is_maintenance()) {
		include_once("../site/errors/Maintenance.php");
	} else { 
		
		// check if url-check is enabled
		if ($config->get_value("url-check")) {

			// check if page loaded with valid url 
			if (!$site_manager->is_valid_url()) {

				// handle invalid url error
				$site_manager->handle_error("invalid url load, plese check [url-check, url]: values in config.php", 400);
			}
		}

		// check if page running on https
		if (!$site_manager->check_ssl()) {

			// handle invalid https error
			$site_manager->handle_error("this site can run only on https protocol, check your url in browser or config.php", 400);
		} 
			
		// init main router
		else {
			include_once("../site/Router.php");
		}
	}
?>
