<?php
	require_once('inc/functions.php');
	require_once('mod/validatePass.php');
	if($login){
		header('Location: index.php');
	}
	
	/* Clases */
	$usersClass = new usersClass;
	
	//Recogida de datos
	$name=strtolower($_POST['name']);
	$pass=$_POST['pass1'];
	
	//Comprobaciones de registro
	$validation = false;
	if($usersClass->checkUserExist($name)[0]['Rows']==0){
		if($name!='' && $pass!=''){
			if(strlen($pass)>5){
				$validation = true;
			}
		}
		
	}

	if($validation){
		$usersClass->create($name,get_hash($pass),'','');
		login($name);
		header('Location: index.php');
	}else{		
		header('Location: register.php?msg=Ese usuario ya existe.');
	}
	
?>
