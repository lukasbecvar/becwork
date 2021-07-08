<?php

	class PageConfig {

		public $config = [

			/*	Main config 	*/
			"appName"     => "Becwork",            //Define app name
			"version"     => 1.0,                  //Define app version
			"author"      => "Lukáš Bečvář",       //Define app author
			"authorLink"  => "http://becvar.xyz/", //Define author site
			"maintenance" => "disable",            //Define maintenance status
			"url"         => "http://localhost",   //Define main app url
            "encoding"    => "utf8",               //Define default charset


			/*	Mysql config	*/
			"ip" 		=> 	"127.0.0.1", 	//Define mysql server ip
			"basedb" 	=> 	"becwork",  	//Define mysql default db name
			"username"	=> 	"root", 		//Define mysql user 
			"password" 	=> 	"root"			//Define Mysql password
		];
	}
?>