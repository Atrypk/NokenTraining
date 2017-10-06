<?php
//Requires
require_once('../inc/functions.php');
require_once('../inc/requestTrainingClass.php');
require_once('../inc/tablas/kanjisClass.php');
require_once('../inc/tablas/usersClass.php');

//echo $_SESSION['Pendingkanjis'];
//obtenemos el id del kanji

//Recogida de variables
if(isset($_POST['request'])){
	$request=$_POST['request'];
	if($request=='getRandomKanji'){
		echo getRandomKanji();
	}
}else if(isset($_POST['response'])){
	$response=$_POST['response'];
	$currentTrainKanji=$_SESSION['currentTrainKanji'];
	
	//obtenemos el id del kanji
	$kanjisClass = new kanjisClass;

	$idKanji = $kanjisClass->getIDByEspa($response)[0]['id'];

	if($idKanji==$currentTrainKanji){
		//Agregamos a la lista de aciertos en sesion
		//addShootTraining($response, $idKanji); // fichero de funcion -/inc/session.php
		
		//Agregamos la lista de aciertos en bbdd
		//Creamos un objeto userClass
		$usersClass = new usersClass;
		
		//Obtenemos el resultado de la base de datos
		$responseShoots = $usersClass->getShoots($_SESSION['user'])[0]['shoots'];
		
		//Trasformamos en array el resultado
		$arrayShoots=explode(',',$responseShoots);
		
		//Agregamos el resutlado
		$arrayShoots[$idKanji]=$arrayShoots[$idKanji]+1;
		
		//Lo trasformamos en cadena
		$finalShoots=implode(',',$arrayShoots);
		
		//Actualizamos la base de datos
		$usersClass->updateShoots($_SESSION['user'],$finalShoots);
		
		echo 'shoot';
		
	}else{
		
		//Agregamos a la lista de fallos en sesion
		//addFailsTraining('pamplona','12'); // fichero de funcion -/inc/session.php
		
		//Agregamos la lista de fallos en bbdd
		//Creamos un objeto userClass
		$usersClass = new usersClass;
		
		//Obtenemos el resultado de la base de datos
		$responseFails = $usersClass->getFails($_SESSION['user'])[0]['fails'];
		
		//Trasformamos en array el resultado
		$arrayFails=explode(',',$responseFails);
		
		//Agregamos el resutlado
		$arrayFails[$idKanji]=$arrayFails[$idKanji]+1;
		
		//Lo trasformamos en cadena
		$finalFails=implode(',',$arrayFails);
		
		//Actualizamos la base de datos
		$usersClass->updateFails($_SESSION['user'],$finalFails);
		
		echo 'fail';
	}
	//Eliminamos de la lista de kanjis pendientes el resultado
	deletePendingKanji($idKanji);//Funcion en fichero - inc/session.php
}else{
	//header('Location: index.php');
}			

//Funciones



/**
* Obtiene los datos de un kanji aleatorio (Que no haya salido ya)
* @return obj 
*/
function getRandomKanji(){
	//obtenemos el total de kanjis posibles
	$totalKanjis = 103;
	
	//Comprobamos si esta establecida la variable de sesion de los kanjis pendientes, en caso contrario la iniciamos
	if(!isset($_SESSION['Pendingkanjis'])){
		loadPendingkanjis();
	}
	
	if($_SESSION['Pendingkanjis']==''){
		//Creamos un objeto $requestTraining
		$requestTraining = new requestTrainingClass;
		
		$requestTraining->TrainComplete='true';
		
		setTrainingComplete();
		return json_encode($requestTraining);
	}
	
	
	//Obtenemos un kanji aleatorio dentro del rango de los kanjis pendientes
	$selectedKanji = getIdRandomKanji();

	//Creamos un objeto de la clase kanjisClass
	$kanji = new kanjisClass;
	
	//Accedes al metodo de la clase kanjiClass para obtener los datos del kanji selecionado
	$kanjiData = $kanji->getData($selectedKanji);
	
	//Obtenemos las otras respuestas aleatoriamente
	$fakeResults = getFakeResults($selectedKanji);
	
	//Mezclamos los resultados
	shuffle($fakeResults);
	
	//Creamos un objeto $requestTraining
	$requestTraining = new requestTrainingClass;
	
	
	//Establecemos los datos del objeto respuesta,
	$requestTraining->currentLvl=$_SESSION['train-level'];
	$requestTraining->kanjiImgId=$kanjiData[0]['id'];
	$requestTraining->KanjiName=$kanjiData[0]['name'];
	$requestTraining->KanjiEspa=$kanji->getData($fakeResults[0])[0]['espa'];
	$requestTraining->KanjiEspa2=$kanji->getData($fakeResults[1])[0]['espa']; //Objeto respuesta - campo objeto respuesta - objeto kanji - funcion de kanji - array con random - array con resultado de funcion
	if($_SESSION['train-level']=='Medio'){
		$requestTraining->KanjiEspa3=$kanji->getData($fakeResults[2])[0]['espa'];
	}else if($_SESSION['train-level']=='Avanzado'){
		$requestTraining->KanjiEspa3=$kanji->getData($fakeResults[2])[0]['espa'];
		$requestTraining->KanjiEspa4=$kanji->getData($fakeResults[3])[0]['espa'];
	}else if($_SESSION['train-level']=='Me lo sé'){
		$requestTraining->KanjiEspa3=$kanji->getData($fakeResults[2])[0]['espa'];
		$requestTraining->KanjiEspa4=$kanji->getData($fakeResults[3])[0]['espa'];
		$requestTraining->KanjiEspa5=$kanji->getData($fakeResults[4])[0]['espa'];
	}
	$requestTraining->TrainComplete='false';
	
	//Guardamos en la sesion el kanji correcto
	setSessionTrainKanji($kanjiData[0]['id']);

	return json_encode($requestTraining);
}

/**
* Devuelve un kanji aleatorio dentro del rango de kanjis pendientes
* @return type string
*/		
function getIdRandomKanji(){
	//Obtenemos un array con los kanjis diponibles
	$currentKanjis = explode(',',$_SESSION['Pendingkanjis']);
	
	//Obtenemos el numero de kanjis actuales en nuestra variable
	$countCurrentsKanjis = count($currentKanjis);
	
	if($countCurrentsKanjis==1){
		return $currentKanjis[0];
	}
	
	//Obtenemos un numero aleatorio entre el 0 y el tamaño del array generado con los kanjis actuales
	$randomKanji = rand(1 , $countCurrentsKanjis-1);
	
	//Obtenemos el kanji de la posición elegida
	$selectedKanji = $currentKanjis[$randomKanji];
	
	return $selectedKanji;
}

/**
* Devuelve un kanji aleatorio ignorando cuales hay pendientes
* @return type string
*/		
function getIdRandomKanjiNoPending(){
	$totalKanjis = 103;
	
	//Obtenemos un numero aleatorio entre el 0 y el tamaño del array generado con los kanjis actuales
	$randomKanji = rand(1 , $totalKanjis-1); 
	
	return $randomKanji;
}

/**
* Devuelve un array con los fakeresults
* @param idCorrectKanji Id del kanji correcto, para que no salga por azar en un fakeresult el reusltado correcto
* @return type array
*/		
function getFakeResults($id){
	$fakeResults=[];
	$currentGetKanji;
	$loop = 1;
	$opt0=-1;
	$opt1=-1;
	$opt2=-1;
	$opt3=-1;
	
	//Establecemos el resultado correcto en el parametro 0 para asegurarnos de no cortarlo al final por el nivel
	$fakeResults[0]=$id;
	
	while ($loop < 5){
		$currentGetKanji=getIdRandomKanjiNoPending();
		if($currentGetKanji!=$id && $currentGetKanji!=$opt0 && $currentGetKanji!=$opt1 && $currentGetKanji!=$opt2 && $currentGetKanji!=$opt3){
			$fakeResults[$loop]=$currentGetKanji;
			$loop++;
			if($opt0==-1){
				$opt0=$currentGetKanji;
			}else if($opt1==-1){
				$opt1=$currentGetKanji;
			}else if($opt2==-1){
				$opt2=$currentGetKanji;
			}else if($opt3==-1){
				$opt3=$currentGetKanji;
			}
		}
	}
	
	if($_SESSION['train-level']=='Principiante'){
		$fakeResults = array_slice($fakeResults,0,2);
	}else if($_SESSION['train-level']=='Medio'){
		$fakeResults = array_slice($fakeResults,0,3);
	}else if($_SESSION['train-level']=='Avanzado'){
		$fakeResults = array_slice($fakeResults,0,4);
	}
		
	return $fakeResults;
}

?>