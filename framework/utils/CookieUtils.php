<?php 

    namespace becwork\utils;

    class CookieUtils {

        /*
          * FUNCTION: set cookie with name, value, expiration
          * USAGE: cookieSet("TestCookie", 69, time() + (60*60*24*7));
          * INPUT: name value and expiration time in seconds
        */
        public function cookieSet($name, $value, $expiration) {
            setcookie($name, $value, $expiration);
        }

        /*
          * FUNCTION: get cookie by name
          * USAGE: $cookie = getCookie("cookieName")
          * INPUT: cookie name
          * Return cookie value
        */
        public function getCookie($name) {
            return $_COOKIE[$name];
        }

        /*
          * FUNCTION: unset cookie by name
          * USAGE: unset_cookie("name");
          * INPUT: cookie name (string)
        */
        public function unset_cookie($name) {
            $host = $_SERVER['HTTP_HOST'];
            $domain = explode(':', $host)[0];

            $uri = $_SERVER['REQUEST_URI'];
            $uri = rtrim(explode('?', $uri)[0], '/');

            if ($uri && !filter_var('file://' . $uri, FILTER_VALIDATE_URL)) {
                throw new Exception('invalid uri: ' . $uri);
            }

            $parts = explode('/', $uri);

            $cookiePath = '';
            foreach ($parts as $part) {
                $cookiePath = '/'.ltrim($cookiePath.'/'.$part, '//');

                setcookie($name, '', 1, $cookiePath);

                $_domain = $domain;
                do {
                    setcookie($name, '', 1, $cookiePath, $_domain);
                } while (strpos($_domain, '.') !== false && $_domain = substr($_domain, 1 + strpos($_domain, '.')));
            }
        }

        /*
          * FUNCTION: print cookie array
          * USAGE: printCookie()
        */
        public function printCookie() {
            print_r($_COOKIE);
        }
    }
?>
