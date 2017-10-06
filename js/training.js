//Función para obtener kanji
function getKanji(){
	if(window.XMLHttpRequest) {
		ajaxGetKanji = new XMLHttpRequest();
	}
	else if(window.ActiveXObject) {
		ajaxGetKanji = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajaxGetKanji.onreadystatechange = load;

	var request = "request="+encodeURIComponent('getRandomKanji') + "&nocache";
	ajaxGetKanji.open('POST', 'ajax/processTrain.php', true);
	ajaxGetKanji.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxGetKanji.send(request);
	
	function load() {
		if(ajaxGetKanji.readyState == 4) {
		  if(ajaxGetKanji.status == 200) {
			//Obtenemos la respuesta, purgamos la cabecera de la respuesta y la enviamos a la funcion que cargara el kanji en la web
			loadTrainRequest(ajaxGetKanji.responseText.replace("<meta charset='UTF-8'>",''));			
		  }
		}
	}
}

//Función para enviar la respuesta
function sendResponse(value){
	if(window.XMLHttpRequest) {
		ajaxGetKanji = new XMLHttpRequest();
	}
	else if(window.ActiveXObject) {
		ajaxGetKanji = new ActiveXObject("Microsoft.XMLHTTP");
	}

	ajaxGetKanji.onreadystatechange = load;

	var request = "response="+encodeURIComponent(value) + "&nocache";
	ajaxGetKanji.open('POST', 'ajax/processTrain.php', true);
	ajaxGetKanji.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxGetKanji.send(request);
	
	function load() {
		if(ajaxGetKanji.readyState == 4) {
		  if(ajaxGetKanji.status == 200) {
			//Obtenemos la respuesta, purgamos la cabecera de la respuesta y la enviamos a la funcion que cargara el kanji en la web
			var result=ajaxGetKanji.responseText.replace("<meta charset='UTF-8'>",'').trim();
			checkResult(result);
		  }
		}
	}
}

function checkResult(result){
	var divResult = document.getElementById('responses');
	
	if(result == 'shoot'){
		divResult.innerHTML='<h1>Acertaste!</h1><br><input type="button" id="continuar" name="continuar" value="Continuar" class="login login-submit boton-card" onclick="sendTo('+"'"+'training.php'+"'"+')">';
	}else if(result == 'fail'){
		divResult.innerHTML='<h1>Fallaste!</h1><br><input type="button" id="continuar" name="continuar" value="Continuar" class="login login-submit boton-card" onclick="sendTo('+"'"+'training.php'+"'"+')">';
	}
}

//Funcion que actualiza los datos de la web tras recibir el kanji elegido y las fakeresults
function loadTrainRequest(request){
	
	//Creamos el objeto desde el JSON recibido
	requestObj=(JSON.parse(request));
	
	//Comprobamos que no se completo el entrenamiento
	if(requestObj['TrainComplete']=='true'){
		sendTo('staffs.php');
		return true;
	}

	
	//Obtenemos los datos del objeto, 
	var currentLvl = requestObj['currentLvl'];
	var kanjiImgId = requestObj['kanjiImgId'];
	var KanjiName = requestObj['KanjiName'];
	var KanjiEspa = requestObj['KanjiEspa'];
	var KanjiEspa2 = requestObj['KanjiEspa2'];
		
	//establecemos las variables necesarias y 
	var image = document.getElementById('image');
	var option1 = document.getElementById('option1');
	var option2 = document.getElementById('option2');
	
	//seteamos los valores HTML
	image.src="img/kanjis/"+kanjiImgId+".gif";
	option1.value=KanjiEspa;
	option2.value=KanjiEspa2;
	
	//Cargamos las variables dinamicas igual que las anteriores
	if(currentLvl=='Medio'){
		//Obtenemos los datos del objeto,
		var KanjiEspa3 = requestObj['KanjiEspa3'];
		
		//establecemos las variables necesarias y 
		var option3 = document.getElementById('option3');
		
		//seteamos los valores HTML
		option3.value=KanjiEspa3;
		
	}else if(currentLvl=='Avanzado'){
		//Obtenemos los datos del objeto,
		var KanjiEspa3 = requestObj['KanjiEspa3'];
		var KanjiEspa4 = requestObj['KanjiEspa4'];
		
		//establecemos las variables necesarias y 
		var option3 = document.getElementById('option3');
		var option4 = document.getElementById('option4');
		
		//seteamos los valores HTML
		option3.value=KanjiEspa3;
		option4.value=KanjiEspa4;
	}else if(currentLvl=='Me lo sé'){
		//Obtenemos los datos del objeto,
		var KanjiEspa3 = requestObj['KanjiEspa3'];
		var KanjiEspa4 = requestObj['KanjiEspa4'];
		var KanjiEspa5 = requestObj['KanjiEspa5'];
		
		//establecemos las variables necesarias y 
		var option3 = document.getElementById('option3');
		var option4 = document.getElementById('option4');
		var option5 = document.getElementById('option5');
		
		//seteamos los valores HTML
		option3.value=KanjiEspa3;
		option4.value=KanjiEspa4;
		option5.value=KanjiEspa5;
	}

}
