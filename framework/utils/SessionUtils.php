<?php
    
    namespace becwork\utils;

    class SessionUtils { 

        /*
          * FUNCTION: start session if not started
          * USAGE: sessionStartedCheckWithStart()
        */
        public function sessionStartedCheckWithStart() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        /*
          * FUNCTION: set specific session
          * USAGE: setSession("name", "value")
          * INPUT session name and session value
        */
        public function setSession($sessionName, $sessionValue) {
            $this->sessionStartedCheckWithStart();
            $_SESSION[$sessionName] = $sessionValue;
        }

        /*
          * FUNCTION: check if session seted
          * USAGE: sessionStartedCheckWithStart("name")
          * INPUT session name
          * RETURN: true or false
        */
        public function checkSessionSet($sessionName) {
            $this->sessionStartedCheckWithStart();
            if (isset($_SESSION[$sessionName])) {
                return true;
            } else {
                return false;
            }
        }

        /*
          * FUNCTION: session destroy (Destroy all user sessions)
          * USAGE: sessionDestroy()
        */
        public function sessionDestroy() {
            $this->sessionStartedCheckWithStart();
            session_destroy();
        }

        /*
          * FUNCTION: print session array
          * USAGE: printSession()
        */
        public function printSession() {
            $this->sessionStartedCheckWithStart();
            print_r($_SESSION);
        }
    }
?>
