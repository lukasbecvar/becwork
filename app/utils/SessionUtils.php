<?php // session managment utils
	
	namespace becwork\utils;

	class SessionUtils { 

		/*
		  * FUNCTION: start session if not started
		  * USAGE: start()
		*/
		public function start(): void {
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}

		/*
		  * FUNCTION: set specific session
		  * USAGE: set("name", "value")
		  * INPUT session name and session value
		*/
		public function set($session_name, $session_value): void {
			$this->start();
			$_SESSION[$session_name] = $session_value;
		}

		/*
		  * FUNCTION: session destroy (Destroy all user sessions)
		  * USAGE: destroy()
		*/
		public function destroy(): void {
			$this->start();
			session_destroy();
		}

		/*
		  * FUNCTION: check if session seted
		  * USAGE: start("name")
		  * INPUT session name
		  * RETURN: true or false
		*/
		public function check_session_set($session_name): bool {
			
			// default state value
			$state = false;

			// start session
			$this->start();

			// check if session seted
			if (isset($_SESSION[$session_name])) {
				$state = true;
			}

			return $state;
		}
	}
?>
