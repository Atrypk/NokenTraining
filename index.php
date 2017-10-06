<?php
  /* Includes */
	require_once('inc/functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Noken training</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
    <script language="javascript" type="text/javascript">
      function sendTo(page){
        location=page; 
      }
    </script>
  </head>
  <body>
    <?php
    
    if($login){
        ?>
        <div class="login-card">
          <h1>Opciones</h1><br>
          
          <input type='button' id='training' name='training' value='Entrenar' class="login menuButton" onclick='sendTo("training.php")'/>
          <input type='button' id='fillEspa' name='fillEspa' value='Rellenar - Español' class="login menuButton" onclick='sendTo("fillEspa.php")'/>
          <input type='button' id='fillJapo' name='fillJapo' value='Rellenar - Japones' class="login menuButton" onclick='sendTo("fillJapo.php")'/>
          <input type='button' id='study' name='rellenaJapo' value='Estudiar' class="login menuButton" onclick='sendTo("study.php")'/>
          <input type='button' id='closeSession' name='closeSession' value='Desconectar' class="login menuButton" onclick='sendTo("disconect.php")'/>
                
        </div>
        
        <?php
      }else{
        ?>
      <div class="login-card">
        <div id='msg'>
          <?php
            if(isset($_REQUEST['msg'])){
              echo $_REQUEST['msg'];
            }
          ?>
        </div>
        <h1>Login</h1><br>
        <form id='loginForm' name='loginForm' action='access.php' method='post'>
          <input type="text" name="user" placeholder="Usuario">
          <input type="password" name="pass" placeholder="Contraseña">
          <input type="submit" name="login" class="login login-submit" value="login">
        </form>
        
        <div class="login-help">
          <a href="register.php">Registro</a> • <a href="register.php">Contraseña olvidada</a>
        </div>
      </div>
      <?php
        }
      ?>
  </body>
</html>