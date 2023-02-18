<?php 

    namespace becwork\utils;
    
    class UrlUtils { 

        /*
          * FUNCTION: get actual url by protocol
          * USAGE: getActualURLComplete('https://')
          * INPUT: protocol
          * RETURN: actual page complete
        */
        public function getActualURLComplete($protocol) {
            return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        }

        /*
          * FUNCTION: get actual url by protocol
          * USAGE: getActualURL('https://')
          * INPUT: protocol
          * RETURN: actual base page
        */
        public function getActualURL($protocol) {
            return $protocol.$_SERVER['HTTP_HOST'];
        }

        /*
          * FUNCTION: redirect user
          * USAGE: redirect("home.php")
          * INPUT: page
        */
        public function redirect($page) {
            header("location:$page");
        }

        /*
          * FUNCTION: refrash page
          * USAGE: refrash(1, "login.php")
        */
        public static function refrash($time, $page) {
            header("Refresh: $time; url=$page");
        }

        /*
          * FUNCTION: get route uri
          * USAGE: $route = getRoute();
        */
        public function getRoute() {
          return $_SERVER['REQUEST_URI'];
        }

        /*
          * FUNCTION: redirect with java script
          * USAGE: jsRedirect("index.php")
        */
        public function jsRedirect($page) {
          print '<script type="text/javascript">window.location.replace("'.$page.'");</script>';
        }
    }
?>
