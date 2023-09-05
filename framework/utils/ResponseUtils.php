<?php // response utils
  
	namespace becwork\utils;
	
	class ResponseUtils { 

		/*
		  * FUNCTION: get website status by domain
		  * USAGE: $status = checkOnline("https://becvar.xyz");
		  * INPUT: domain url
		  * RETURN: Online or Offline string
		*/
		public function checkOnline($domain): string {

			// default output value
			$output = "Offline";

			// init curl
			$curl_init = curl_init($domain);

			// set optitons
			curl_setopt($curl_init,CURLOPT_CONNECTTIMEOUT,10);
			curl_setopt($curl_init,CURLOPT_HEADER,true);
			curl_setopt($curl_init,CURLOPT_NOBODY,true);
			curl_setopt($curl_init,CURLOPT_RETURNTRANSFER,true);

			// open connection
			$response = curl_exec($curl_init);

			// close connection
			curl_close($curl_init);
			
			// check response
			if ($response) {
				$output = "Online";
			} 

			return $response;
		}

		/*
		  * FUNCTION: send 404 error
		*/
		public function send404Header(): void {
			http_response_code(404);
			header("HTTP/1.0 404 Not Found");
		}

		/*
		* FUNCTION: get service status
		* USAGE: $status = serviceOnlineCheck("127.0.0.1", 25565);
		* INPUT: server ip and port
		* RETURN: On or Of string
		*/
		public function serviceOnlineCheck($ip, $port): string {
			
			// default output value
			$status = "Offline";

			// open socket
			$service = @fsockopen($ip, $port);

			// check service
			if($service >= 1) {
				$status = 'Online';
			} 

			return $status;
		}
	}
?>