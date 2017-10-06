<?php	
	/**
	 * Esta clase contiene las funciones necesarias para gestionar la tabla usersClass de la base de datos
	 * 
	 * @package  Estructura Aplicación WEB
	 * @author   Alejandro Esquiva Rodríguez <alejandro@geekytheory.com>
	 * @license  Geeky Theory License
	 * @link     https://twitter.com/alex_esquiva
	 *
	 */
	class usersClass{
	
		public $ID = 0;
		/**
		 * Crea una nueva fila en la tabla table1.
		 * @param type $name
		 * @param type $pass
		 * @param type $fails
		 * @param type $shoots
		 * @return type
		 */
		function create($campo1,$campo2,$campo3,$campo4){
			
		   
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "insert into users (name,pass) 
			values ('".$campo1."','".$campo2."');";
			$consulta = mysqli_query($conexion,$sql);
			if($consulta){
			}else{
				   echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
		}
		/**
		 * Modifica la tabla con los datos introducidos
		 * @param type $name
		 * @param type $pass
		 * @param type $fails
		 * @param type $shoots
		 * @param type $image
		 * @return type
		 */
		function update($campo1,$campo2,$campo3,$campo4){
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "UPDATE users SET "
					. "name = '$campo1', "
					. "pass = '$campo2', "
					. "fails = '$campo3', "
					. "shoots = '$campo4' 
			WHERE ID = $this->ID ;";
			$consulta = mysqli_query($conexion,$sql);
			if(!$consulta){
				   echo "No se ha podido modificar la base de datos<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
			
		}
		/**
		 * Borra el elemento a partir de un ID dado
		 * @param type $ID
		 * @return type
		 */ 
		function delete($ID){
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "DELETE FROM users WHERE ID=$ID;";
			$consulta = mysqli_query($conexion,$sql);
			if($consulta){
			}else{
				   echo "No se ha podido borrar la table1<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
		}
		
		/**
		 * Devuelve la cantidad de usuarios con el nombre enviado
		 * @return type
		 */
		function checkUserExist($name){
			//Creamos la consulta
			$sql = "SELECT COUNT(*) As Rows FROM users WHERE name='".$name."'";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Devuelve la pass del usuario enviado
		 * @return type
		 */
		function getPass($name){
			//Creamos la consulta
			$sql = "SELECT pass FROM users WHERE name = '".$name."';";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}

		
		/**
		 * Devuelve un array con la información de una fila a partir de un ID
		 * @return type
		 */
		function getData(){
			//Creamos la consulta
			$sql = "SELECT * FROM users WHERE ID = $this->ID;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Devuelve un array con los aciertos en funcion del nombre de usuario
		 * * @param type string $name nombre del usuario
		 * @return type array
		 */
		function getShoots($name){
			//Creamos la consulta
			$sql = "SELECT shoots FROM users WHERE name = '".$name."';";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Modifica la tabla con los aciertos
		 * @param type string $name
		 * @return type array
		 */
		function updateShoots($name,$shoots){
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "UPDATE users SET "					
					. "shoots = '$shoots' 
			WHERE name = '".$name."' ;";
			$consulta = mysqli_query($conexion,$sql);
			if(!$consulta){
				   echo "No se ha podido modificar la base de datos<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
			
		}
		
		/**
		 * Devuelve un array con los aciertos en funcion del nombre de usuario
		 * * @param type string $name nombre del usuario
		 * @return type array
		 */
		function getFails($name){
			//Creamos la consulta
			$sql = "SELECT fails FROM users WHERE name = '".$name."';";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Modifica la tabla con los aciertos
		 * @param type string $name
		 * @return type array
		 */
		function updateFails($name,$shoots){
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "UPDATE users SET "					
					. "fails = '$shoots' 
			WHERE name = '".$name."' ;";
			$consulta = mysqli_query($conexion,$sql);
			if(!$consulta){
				   echo "No se ha podido modificar la base de datos<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
			
		}
		
		/**
		function getCampo1(){
			//Creamos la consulta
			$sql = "SELECT campo1 FROM users WHERE ID = $this->ID;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array[0][0];
		}
		*/
		
		function totalProjects(){
			//Creamos la consulta
			$sql = "SELECT COUNT(*) As Rows FROM users WHERE fails=0";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		function totalServices(){
			//Creamos la consulta
			$sql = "SELECT COUNT(*) As Rows FROM users WHERE fails=1";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Devuelve todos los proyectos
		 * @return type
		 */
		function getAllusers(){
			//Creamos la consulta
			$sql = "SELECT * FROM users WHERE fails=0;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
				
		
		/**
		 * Devuelve Toda la información de la tabla table1
		 * @return type
		 */
		function getAllInfo(){
			//Creamos la consulta
			$sql = "SELECT * FROM users;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
	}
?>