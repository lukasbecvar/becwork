<?php // main page config

	namespace becwork\config;

	class PageConfig {

		public $config = [

			/* main config */
			"appName"     => "Becwork",            	 // define app name
			"version"     => 2.5,                  	 // define app version
			"author"      => "Lukáš Bečvář",       	 // define app author
			"authorLink"  => "https://becvold.xyz/", // define author site
			"https"       => false,				   	 // If this = true (Site can run only on https://)
			"dev-mode"    => true,					 // define devmode enabled
			"url-check"   => true,				     //	check if url valid
			"url"         => "localhost",   		 // define main app url
			"encoding"    => "utf8",               	 // define default charset
			
			/* page config */
			"maintenance" => false,		// Define maintenance status

			/*	mysql config	*/
			"ip" 		=> 	"127.0.0.1", 	// define mysql server ip
			"basedb" 	=> 	"becwork",  	// define mysql default db name
			"username"	=> 	"root", 		// define mysql user 
			"password" 	=> 	"root"			// define Mysql password
		];
	}
?>