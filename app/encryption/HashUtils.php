<?php // string hash methods

	namespace becwork\utils;

	class HashUtils { 

		/*
		  * FUNCTION: hashValidate validate hash = string
		  * USAGE: hashValidate("password", "password_hash")
		  * Input text type string, hash type string
		  * RETURN: true or false
		*/
		public function hashValidate($plain_text, $hash): bool {

			// default state
			$state = false;

			// check if password verified
			if (password_verify($plain_text, $hash)) {
				$state = true;
			} 

			return $state;
		}

		/*
		  * FUNCTION: bcrypt hash generate
		  * USAGE: genBcrypt("plaintext", "cost int")
		  * Input text type string, hash cost type int
		  * RETURN: final hash type string
		*/
		public function genBcrypt($plain_text, $cost): string {
			$options = [
				'cost' => $cost
			];
			$hash_final = password_hash($plain_text, PASSWORD_BCRYPT, $options);
			return $hash_final;
		}

		/*
		  * FUNCTION: genSHA1 hash generate
		  * USAGE: genSHA1("plaintext")
		  * Input text type string
		  * RETURN: final hash type string
		*/
		public function genSHA1($plain_text): string {
			$hash = "*" . sha1(sha1($plain_text, true));
			$hash_final = strtoupper($hash);
			return $hash_final;
		}

		/*
		  * FUNCTION: hashMD5 hash generate
		  * USAGE: hashMD5("plaintext")
		  * Input text type string
		  * RETURN: final hash type string
		*/
		public function hashMD5($plain_text): string {
			$hash_final= hash('md5', $plain_text);
			return $hash_final;
		}

		/*
		  * FUNCTION: generate sha256 hash form string
		  * USAGE: genSHA256("string");
		  * INPUT: text in string
		  * RETURN: final sha256 hash form string
		*/
		public function genSHA256($plain_text): string {
			$final_hash = hash('sha256', $plain_text);
			return $final_hash;
		}

		/*
		  * FUNCTION: generate custom hash form string by name
		  * USAGE: customhash("string", "sha1");
		  * INPUT: text in string, hash name in string
		  * RETURN: final hash form string
		*/
		public function customHash($plain_text, $hash): string {
			$final_hash = hash($hash, $plain_text);
			return $final_hash;
		}
	}
?>