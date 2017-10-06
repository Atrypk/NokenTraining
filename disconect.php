<?php
	  /* Includes */
	require_once('inc/functions.php');
	
	if($login){
		disconect();
		header('Location: index.php');
	}else{
		header('Location: register.php');
	}
?>