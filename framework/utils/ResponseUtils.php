<?php 
  
    namespace becwork\utils;
	
    class ResponseUtils { 

		/*
		  * FUNCTION: get website status by domain
		  * USAGE: $status = checkOnline("https://becvold.xyz");
		  * INPUT: domain url
		  * RETURN: Online or Offline string
		*/
		public function checkOnline($domain) {

			$curlInit = curl_init($domain);

			curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
			curl_setopt($curlInit,CURLOPT_HEADER,true);
			curl_setopt($curlInit,CURLOPT_NOBODY,true);
			curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

			$response = curl_exec($curlInit);

			curl_close($curlInit);
			
			if ($response) {
				return "Online";
			} else {
				return "Offline";
			}
		}

    /*
      * FUNCTION: send 404 error
    */
    public function send404Header() {
      http_response_code(404);
      header("HTTP/1.0 404 Not Found");
    }

    /*
      * FUNCTION: fake apache error page
      * USAGE: echo drawApache404ErrorIndex()
      * RETURN: apache not found page
    */
    public function drawApache404ErrorIndex() {
      $string = "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\n<html><head>\n<title>404 Not Found</title>\n</head><body>\n<h1>Not Found</h1>\n<p>The requested URL was not found on this server.</p>\n</body></html>";
      return $string;
    }

    /*
     * FUNCTION: get service status
     * USAGE: $status = serviceOnlineCheck("127.0.0.1", 25565);
     * INPUT: server ip and port
     * RETURN: On or Of string
    */
    public function serviceOnlineCheck($ip, $port) {
      $service = @fsockopen($ip, $port, $errno, $errstr, 2);

      if($service >= 1) {
        return 'Online';
      } else {
       return 'Offline';
      }
    }
	}
?>