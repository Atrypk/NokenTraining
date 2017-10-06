//Script de funciones para el index

//Al cargar la pagina
window.onload = function() {
	/*Variables*/
	//Elementos HTML
	var usuario = document.getElementById('name');
	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');
	
	
}

//Comprobar que las contraseñas son iguales
function checkPass(pass1, pass2){
	if(pass1.length < 6){
		return 1;
	}
	
	if(pass1==pass2){
		return 0;
	}else{
		return 2;
	}
	
}

function validate(idFormulario){
	var pass1 = document.getElementById('pass1').value;
	var pass2 = document.getElementById('pass2').value;
	var formulario = document.getElementById(idFormulario);
	var msg = document.getElementById('msg');
	
	if(checkPass(pass1,pass2)===0){
		formulario.submit();
	}else if(checkPass(pass1,pass2)==1){
		alert("la contraseña es demasiado corta.");
	}else if(checkPass(pass1,pass2)==2){
		alert("Las contraseñas no coinciden");
	}
	
	msg.style="display:none";
}

