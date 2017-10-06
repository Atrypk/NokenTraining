<?php	
	/**
	 * Esta clase contiene las funciones necesarias para gestionar la tabla table1 de la base de datos
	 * 
	 * @package  Estructura Aplicación WEB
	 * @author   Alejandro Esquiva Rodríguez <alejandro@geekytheory.com>
	 * @license  Geeky Theory License
	 * @link     https://twitter.com/alex_esquiva
	 *
	 */
	class kanjisClass{
	
		public $ID = 0;
		/**
		 * Crea una nueva fila en la tabla table1.
		 * @param type $name
		 * @param type $pass
		 * @param type $fails
		 * @param type $shoots
		 * @return type
		 */
		function create($campo1,$campo2,$campo3,$campo4,$campo5){
			
		   
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "insert into kanjis (id,name,espa,japo,japo_image) 
			values ('".$campo1."','".$campo2."','".$campo3."','".$campo4."','".$campo5."');";
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
		function update($campo1,$campo2,$campo3,$campo4,$campo5){
			
			$connect = new Tools();
			$conexion = $connect->connectDB();
			$sql = "UPDATE kanjis SET "
					. "name = '$campo1', "
					. "pass = '$campo2', "
					. "fails = '$campo3', "
					. "shoots = '$campo4', "
					. "shoots = '$campo5' 
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
			$sql = "DELETE FROM kanjis WHERE ID=$ID;";
			$consulta = mysqli_query($conexion,$sql);
			if($consulta){
			}else{
				   echo "No se ha podido borrar la table1<br><br>".mysqli_error($conexion);
			}
			$connect->disconnectDB($conexion);
			return $consulta;
		}
		
		/**
		 * Devuelve un array con la información de una fila a partir de un ID
		 * @return type
		 */		
		function getData($id){
			//Creamos la consulta
			$sql = "SELECT * FROM kanjis WHERE ID = $id;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		/**
		 * Devuelve un array con la información de una fila a partir de un ID
		 * @return type
		 */		
		function getIDByEspa($espa){
			//Creamos la consulta
			$sql = "SELECT id FROM kanjis WHERE espa = '".$espa."';";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
		
		
		/**
		function getCampo1(){
			//Creamos la consulta
			$sql = "SELECT campo1 FROM kanjis WHERE ID = $this->ID;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array[0][0];
		}
		*/
				
		/**
		 * Devuelve todos los servicios
		 * @return type
		 */
		function getAllServices(){
			//Creamos la consulta
			$sql = "SELECT * FROM kanjis WHERE fails=1;";
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
			$sql = "SELECT * FROM kanjis;";
			//obtenemos el array
			$tool = new Tools();
			$array = $tool->getArraySQL($sql);
			return $array;
		}
	}
?>