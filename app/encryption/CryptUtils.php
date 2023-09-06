<?php // string encryption & encode methods

	namespace becwork\utils;

	class CryptUtils {

		/*
		  * FUNCTION: Base64 gen function
		  * INPUT: String or file (img, etc.)
		  * RETURN: Base64 code
		*/
		public function genBase64($decoded_string): ?string {
			$base64 = base64_encode($decoded_string);
			return $base64;
		}

		/*
		  * FUNCTION: Base64 decode function
		  * INPUT: base64 code
		  * RETURN: string or file
		*/
		public function decodeBase64($base64): ?string {
			$decoded_string = base64_decode($base64);
			return $decoded_string;
		}

		/*
		  * FUNCTION: AES128 AES encrypt
		  * INPUT: string or file, encrypt key, encrypt method: aes-128-cbc
		  * RETURN: encrypted string
		*/
		public function encryptAES($plain_text, $password, $method): ?string {
		  
			$salt = openssl_random_pseudo_bytes(8);
			$salted = '';
			$dx = '';
		  
			while (strlen($salted) < 48) {
				$dx = md5($dx.$password.$salt, true);
				$salted .= $dx;
			}
		  
			$key = substr($salted, 0, 32);
			$iv  = substr($salted, 32,16);
			$encrypted_data = openssl_encrypt(json_encode($plain_text), $method, $key, true, $iv);
			$data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
		  
			$json = json_encode($data);
			return $json;
		}

		/*
		  * FUNCTION: AES128 AES decrypt
		  * INPUT: string or file, decrypt key, encrypt method: aes-128-cbc
		  * RETURN: decrypted string
		*/
		public function decryptAES($json_string, $password, $method): ?string {
		  
			$json_data = json_decode($json_string, true);
			$salt = hex2bin($json_data["s"]);
			$ct = base64_decode($json_data["ct"]);
			$iv  = hex2bin($json_data["iv"]);
			$concated_passphrase = $password.$salt;
			$md5 = array();
			$md5[0] = md5($concated_passphrase, true);
			$result = $md5[0];
		  
			for ($i = 1; $i < 3; $i++) {
				$md5[$i] = md5($md5[$i - 1].$concated_passphrase, true);
				$result .= $md5[$i];
			}
		  
			$key = substr($result, 0, 32);
			$data = openssl_decrypt($ct, $method, $key, true, $iv);
			$output = json_decode($data, true);
			return $output;
		}
	}
?>