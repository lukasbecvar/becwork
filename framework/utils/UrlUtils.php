<?php // url manager utils

	namespace becwork\utils;
	
	class UrlUtils { 

		/*
		  * FUNCTION: get actual url by protocol
		  * USAGE: getActualURLComplete('https://')
		  * INPUT: protocol
		  * RETURN: actual page complete
		*/
		public function getActualURLComplete($protocol): ?string {
			$url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			return $url;
		}

		/*
		  * FUNCTION: get actual url by protocol
		  * USAGE: getActualURL('https://')
		  * INPUT: protocol
		  * RETURN: actual base page
		*/
		public function getActualURL($protocol): ?string {
			$url = $protocol.$_SERVER['HTTP_HOST'];
			return $url;
		}

		/*
		  * FUNCTION: redirect user
		  * USAGE: redirect("home.php")
		  * INPUT: page
		*/
		public function redirect($page): void {
			header("location:$page");
		}

		/*
		  * FUNCTION: refrash page
		  * USAGE: refrash(1, "login.php")
		*/
		public static function refrash($time, $page): void {
			header("Refresh: $time; url=$page");
		}

		/*
		  * FUNCTION: get route uri
		  * USAGE: $route = getRoute();
		*/
		public function getRoute(): ?string {
			$uri = $_SERVER['REQUEST_URI'];
			return $uri;
		}

		/*
		  * FUNCTION: redirect with java script
		  * USAGE: jsRedirect("index.php")
		*/
		public function jsRedirect($page): void {
			print '<script type="text/javascript">window.location.replace("'.$page.'");</script>';
		}
	}
?>
