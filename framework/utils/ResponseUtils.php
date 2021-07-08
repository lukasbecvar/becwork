<?php  

	class ResponseUtils {


		/*
			* The function for get website status
			* Usage like $status = checkOnline("https://becvar.xyz");
			* Input domain url
			* Returned Online or Offline string
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
	}
?>