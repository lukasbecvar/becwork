<?php // hash functions

	namespace becwork\utils;

	class HashUtils { 

		/*
		  * FUNCTION: blowfish hash generate
		  * USAGE: genBlowFish("plaintext")
		  * Input text type string
		  * RETURN: final hash type string
		*/
		public function genBlowFish($plain_text) {
			$hash_fromat = "$2y$10$";
			$salt = "123sbrznvdzvchpj8z5p5k";
			$hash_fromat_salt = $hash_fromat.$salt;
			$crypted = crypt($plain_text, $hash_fromat_salt);
			return $crypted;
		}

		/*
		  * FUNCTION: genSHA1 hash generate
		  * USAGE: genSHA1("plaintext")
		  * Input text type string
		  * RETURN: final hash type string
		*/
		public function genSHA1($plain_text) {
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
		public function hashMD5($plain_text) {
			$hash_final= hash('md5', $plain_text);
			return $hash_final;
		}

		/*
		  * FUNCTION: generate sha256 hash form string
		  * USAGE: genSHA256("string");
		  * INPUT: text in string
		  * RETURN: final sha256 hash form string
		*/
		public function genSHA256($plain_text) {
			$final_hash = hash('sha256', $plain_text);
			return $final_hash;
		}

		/*
		  * FUNCTION: generate custom hash form string by name
		  * USAGE: customhash("string", "sha1");
		  * INPUT: text in string, hash name in string
		  * RETURN: final hash form string
		*/
		public function customHash($plain_text, $hash) {
			$final_hash = hash($hash, $plain_text);
			return $final_hash;
		}
	}
?>