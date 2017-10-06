<?php
    /* Includes */
    require_once('inc/functions.php');
    if(!$login){
        header('Location: index.php?msg=Conectese para acceder al contenido.');
    }
    
    
    if(isset($_REQUEST['lvl'])){
        //Recogida de datos
        $lvl=$_REQUEST['lvl'];
        
        //Establecemos el nivel
        setLvl($lvl);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Noken training</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <!-- Scripts js -->
        <script type="text/javascript" src="js/training.js"></script>
        <script language="javascript" type="text/javascript">
            //Comprobamos si el entrenamiento esta completo para realizar el reinicio
            <?php
                if(isset($_SESSION['trainingComplete'])){
                    if($_SESSION['trainingComplete']=='true'){
                        resetTrain();
                    }
                }
            
            ?>
              
            
            //Funcion que te envia a la pagina que envies en el parametro
            function sendTo(page){
              location=page; 
            }
            //Funcion que establece el nivel
            function setLvl(lvl){
                location='training.php?lvl='+lvl;
            }
            //Fucnion que envia la respuesta elegida
            function response(response){
                sendResponse(response);
            }
            <?php
                if(isset($_SESSION['train-level'])){
            ?>
            window.onload = function() {
                getKanji();                
            };
            
            <?php
                }
            ?>
        </script>
    </head>
    <body>
        <?php
            if(isset($_SESSION['train-level'])){
        ?> 
            <div class="login-card">
            <div id='msg'>
                Nivel: <?php echo $_SESSION['train-level'] ?>
            </div>
            <h1>Entrenamiento</h1><br>
                <div class="image"><img id='image' name='image' class='kanji' src="img/style/Loading_icon.gif"></div>
            
         <!--
            <input type="text" name="texto1" placeholder="Texto 1">
            <input type="text" name="texto2" placeholder="Texto 2">
        -->
        </div>
    
        <div id='responses' name='responses' class="respuesta">
                
            <input type='button' id='option1' name='option1' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            <input type='button' id='option2' name='option2' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            <?php
                if( $_SESSION['train-level']=='Medio' ){
            ?>
            
            <input type='button' id='option3' name='option3' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            
            <?php
                }else if($_SESSION['train-level']=='Avanzado'){
            ?>
            
            <input type='button' id='option3' name='option3' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            <input type='button' id='option4' name='option4' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            
            <?php
                }else if($_SESSION['train-level']=='Me lo sé'){
            ?>
            
            <input type='button' id='option3' name='option3' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            <input type='button' id='option4' name='option4' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            <input type='button' id='option5' name='option5' value='Cargando...' class="login login-submit boton-card" onclick='response(this.value)'/>
            
            <?php
                }
            ?>
            
            <br>
            <h1>Opciones</h1><br>
            <input type='button' id='send' name='send' value='Cambiar nivel' class="login login-submit boton-card" onclick='setLvl("0")'/>
            <input type='button' id='send' name='send' value='Volver a Inicio' class="login login-submit boton-card"  onclick='sendTo("index.php")'/>
        </div>
        <?php
            }else{
        ?>
                <div class="login-card">
                    <h1>Elige un nivel</h1><br>
                     
                    <input type='button' id='beginner' name='beginner' value='Principiante' class="login login-submit boton-card" onclick='setLvl("1")'/>
                    <input type='button' id='intermediate' name='intermediate' value='Medio' class="login login-submit boton-card" onclick='setLvl("2")'/>
                    <input type='button' id='Advanced' name='Advanced' value='Avanzado' class="login login-submit boton-card" onclick='setLvl("3")'/>
                    <input type='button' id='IalreadyKnowIt' name='IalreadyKnowIt' value='Me lo sé' class="login login-submit boton-card" onclick='setLvl("4")'/>
                </div>
        <?php
            }
        ?>

		
    </body>
</html>
       
