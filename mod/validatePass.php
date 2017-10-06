<?php  
 
	function get_hash($password, $cost = 11) {
		// Genera sal de forma aleatoria
		$salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
		// reemplaza caracteres no permitidos
		$salt=str_replace("+",".",$salt);
		// genera una cadena con la configuración del algoritmo
		$param='$'.implode('$',array(
				"2y", // versión más segura de blowfish (>=PHP 5.3.7)
				str_pad($cost,2,"0",STR_PAD_LEFT), // costo del algoritmo
				$salt // añade la sal
		));
	   
		// obtiene el hash de la contraseña
		return crypt($password,$param);
	}
	 
	function validate_pass($hash, $pass) {
		// verifica la contraseña con el hash
		return crypt($pass, $hash) == $hash;
	}
	
	/**
	$hash = get_hash("miPassword");
	echo $hash . '<br />'; // $2y$11$VWjsiQG3cwASWxcDu4XQyOKifKFSWxoAVIL0yd8KJ4laPfDsWz20.
	 
	$isValid = validate_pass($hash, "miPassword");
	echo $isValid ? 'válida' : 'no válida'; // válida
	*/
	
?>