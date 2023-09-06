<?php // browser cookie managment utils

    namespace becwork\utils;

    class CookieUtils {

        /*
          * FUNCTION: set cookie with name, value, expiration
          * USAGE: set("TestCookie", 69, time() + (60*60*24*7));
          * INPUT: name value and expiration time in seconds
        */
        public function set($name, $value, $expiration): void {
            setcookie($name, $value, $expiration);
        }

        /*
          * FUNCTION: get cookie by name
          * USAGE: $cookie = get("cookieName")
          * INPUT: cookie name
          * Return cookie value
        */
        public function get($name): ?string {
            $cookie = $_COOKIE[$name];
            return $cookie;
        }

        /*
          * FUNCTION: unset cookie by name
          * USAGE: unset("name");
          * INPUT: cookie name (string)
        */
        public function unset($name): void {
            $host = $_SERVER['HTTP_HOST'];
            $domain = explode(':', $host)[0];

            $uri = $_SERVER['REQUEST_URI'];
            $uri = rtrim(explode('?', $uri)[0], '/');

            if ($uri && !filter_var('file://' . $uri, FILTER_VALIDATE_URL)) {
                throw new Exception('invalid uri: ' . $uri);
            }

            $parts = explode('/', $uri);

            $cookie_path = '';
            foreach ($parts as $part) {
                $cookie_path = '/'.ltrim($cookie_path.'/'.$part, '//');

                setcookie($name, '', 1, $cookie_path);

                $_domain = $domain;
                do {
                    setcookie($name, '', 1, $cookie_path, $_domain);
                } while (strpos($_domain, '.') !== false && $_domain = substr($_domain, 1 + strpos($_domain, '.')));
            }
        }

        /*
          * FUNCTION: print cookie array
          * USAGE: print()
        */
        public function print(): void {
            print_r($_COOKIE);
        }
    }
?>
