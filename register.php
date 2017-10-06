
<?php
  require_once('inc/session.php');


  //Mensaje de error
  if (isset($_POST['errorText'])){
    echo $_POST['errorText'];
  }

?>

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
		<!-- Carga de scripts -->
		<script type="text/javascript" src="js/validateTools.js"></script>
  </head>
  <body>
    <div class="login-card">
        <div id='msg'>
          <?php
            if(isset($_REQUEST['msg'])){
              echo $_REQUEST['msg'];
            }
          ?>
        </div>
        <h1>Registro</h1><br>
        <form id='register' action='createUser.php' method='post'>          
          <input type='text' id='name' name='name' placeholder="Usuario"/>  
          <input type='password' id='pass1' name='pass1' placeholder="Contraseña"/>    
          <input type='password' id='pass2' name='pass2' placeholder="Repite contraseña">    
          <input type='button' id='send' name='send' value='Resgistrarse' class="login login-submit boton-card" onclick='validate("register")'/>
          <input type='button' id='back' name='back' value='Volver' class="login login-submit boton-card" onclick='sendTo("index.php")'/>
        </form>
    
    
  </body>
  </html>
