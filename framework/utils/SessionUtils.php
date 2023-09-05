<?php // session managment utils
	
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
		public function setSession($session_name, $session_value) {
			$this->sessionStartedCheckWithStart();
			$_SESSION[$session_name] = $session_value;
		}

		/*
		  * FUNCTION: check if session seted
		  * USAGE: sessionStartedCheckWithStart("name")
		  * INPUT session name
		  * RETURN: true or false
		*/
		public function checkSessionSet($session_name) {
			
			// default state value
			$state = false;

			// start session
			$this->sessionStartedCheckWithStart();

			// check if session seted
			if (isset($_SESSION[$session_name])) {
				$state = true;
			}

			return $state;
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
