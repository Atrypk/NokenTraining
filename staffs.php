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
        <div class="login-card">
			<h1>Estadisticas</h1><br>
			
        </div>
        <div id='responses' name='responses' class="respuesta">
			<h4>Estas son tus estadisticas <?php echo $_SESSION['user']?></h4>
			<h4>--Zona en desarrollo, disculpalas molestias.--</h4>
			
			<?php
				if($_SESSION['trainingComplete']=='true'){
					echo '<h4>La proxima vez que accedas a tu seccion de entrenamiento se reiniciaran tus estadisticas de entrenamiento. Las estadisticas finales permaneceran.</h4>';
				}
			?>
			<input type='button' id='back' name='back' value='Volver a inicio' class="login login-submit boton-card" onclick='sendTo("index.php")'/>
		</div>
  </body>
</html>