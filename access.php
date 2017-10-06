<?php
	require_once('inc/functions.php');
	require_once('mod/validatePass.php');
	if($login){
		header('Location: index.php');
	}
	
	/* Clases */
	$usersClass = new usersClass;
	
	//Recogida de datos
	$name=strtolower($_POST['user']);
	$pass=$_POST['pass'];
		
	//Comprobacion de login
	$userLogin = false;
	if(validate_pass($usersClass->getPass($name)[0]['pass'],$pass)){
		$userLogin = true;
	}
	
	if($userLogin){
		login($name);
		header('Location: index.php');
	}else{
		header('Location: index.php?msg=Usuario o contraseña incorrecto.');		
	}
	
?>