<?php // main page config

	namespace becwork\config;

	class PageConfig {

		public $config = [

			/* main config */
			"app-name"    => "Becwork",            	 // define app name
			"version"     => 4.2,                  	 // define app version
			"author"      => "Lukáš Bečvář",       	 // define app author
			"author-link" => "https://becvold.xyz/", // define author site
			"url-check"   => false,				     //	check if url valid
			"url"         => "localhost",   		 // define main app url
			"encoding"    => "utf8",               	 // define default charset
			
			/* page config */
			"maintenance" => false,		// define maintenance status
			"dev-mode"    => true,		// define devmode enabled
			"https"       => false,		// if this = true (Site can run only on https://)
			"error-log"   => true,		// enable log errors to log file (error.log)

			/* database config */
			"db-host-ip"	=> 	"127.0.0.1", 	// define mysql server ip
			"db-database" 	=> 	"becwork",  	// define mysql default db name
			"db-username"	=> 	"root", 		// define mysql user 
			"db-password" 	=> 	"root"			// define Mysql password
		];
	}
?>