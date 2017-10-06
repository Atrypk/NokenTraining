<?php
	session_start();
	//Variable que indica si se está logeado o no
	$login=false;
	
	//Si está logeado
	if ( isset($_SESSION['user']) ){        
	  $login=true;
	}
	
	//Crear variable de sesion
	function login($user){
		$_SESSION['user']=$user;
	}
	
	//Destruir la sesion
	function disconect(){
		session_destroy();
	}
	
	//Funcion que establece el nivel en la session
	function setLvl($lvl){
		if($lvl=='1'){
            $_SESSION['train-level']='Principiante';
        }else if($lvl=='2'){
            $_SESSION['train-level']='Medio';
        }else if($lvl=='3'){
            $_SESSION['train-level']='Avanzado';
        }else if($lvl=='4'){
            $_SESSION['train-level']='Me lo sé';
        }else{
           $_SESSION['train-level']=null;
        }
	}
	
	//Reiniciamos las estadisticas de entrenamiento
	function resetTrain(){
		loadPendingkanjis();
		$_SESSION['shootTraining']=null;
		$_SESSION['failTraining']=null;
	}
	
	//Iniciamos la variable de sesión de los 103 kanjis	
	function loadPendingkanjis(){
		$_SESSION['Pendingkanjis']='1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103';
	}
	
	//Establece el valor del kanji actual en el modo entrenamiento
	function setSessionTrainKanji($value){
		$_SESSION['currentTrainKanji']=$value;
	}

	//Establece el valor del entrenamiento a completo
	function setTrainingComplete(){
		$_SESSION['trainingComplete']='true';
	}	
	
	//Agrega el acierto del entrenamiento a la session
	function addShootTraining($value,$idKanji){
		//Comprobamos si existe la variable y no es null
		if(isset($_SESSION['shootTraining'])){
			//Si existe agregamos el resultado
			$_SESSION['shootTraining'] = $_SESSION['shootTraining'].','.$idKanji;
		}else{
			//Si no existe la inicializamos
			$_SESSION['shootTraining'] = $idKanji;
		}
		
	}
	
	//Agrega el acierto del entrenamiento a la session
	function addFailsTraining($value,$idKanji){
		//Comprobamos si existe la variable y no es null
		if(isset($_SESSION['failTraining'])){
			//Si existe agregamos el resultado
			$_SESSION['failTraining'] = $_SESSION['failTraining'].','.$idKanji;
		}else{
			//Si no existe la inicializamos
			$_SESSION['failTraining'] = $idKanji;
		}
		
	}
	
	//Elimina de los kanjis pendientes el kanji elegido
	function deletePendingKanji($idKanji){
		$arrayPendingKanjis = explode(',',$_SESSION['Pendingkanjis']);
		
		//Establecemos las variables del bucle
		$loop = 0;
		$loopFinal = 0;
		$total = count($arrayPendingKanjis);
		$arrayPendingKanjisFinal = [];
		
		
		for ($loop;$loop<$total;$loop++){
			if(!($arrayPendingKanjis[$loop]==$idKanji)){				
				$arrayPendingKanjisFinal[$loopFinal]=$arrayPendingKanjis[$loop];
				$loopFinal++;				
			}
		}			
		
		$_SESSION['Pendingkanjis'] = implode(',',$arrayPendingKanjisFinal);
		
	}
	
?>