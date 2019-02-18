<?php
class database 		
{
	private $usuario = "root";
	private	$contrasena = "";
	private	$servidor = "localhost";
	private	$basededatos = "framework";
	function conect_open(){
		$conexion = mysqli_connect($servidor,$usuario, "") or die("no se puede establecer conexion con el servidor");
		$db = mysql_select_db($conexion,$basededatos) or die("no se ha establecido conexion con la tabla");
		return;
	}

	function conect_close(){
		$conexion = mysqli_connect( $servidp,$usuario, "") or die("error de cierre de conexion");
		mysql_close($conexion);
	}

	function comprobar_usuario($usr,$pass)
	{	
		$sesion = new sesiones();
		$con=conect_open();
		$sql='SELECT password FROM auditor WHERE usr=$usr';
		$password=mysql_query($sql);
		if ($pass=$password){
			$sesion->declarar_sesion();
			$privilegios = mysql_query('SELECT priv FROM auditor where usr = $usr')
		}
		else{
			echo 'no se puede conectar';
		}
	}
}
?>
<?


<? 
	class sesiones();
		public function declarar_sesion(){
		session_start();
			if(!isset($_SESSION['count']))
			{
				$_SESSION['count']=0;
			}
			else
			{
				$_SESSION['count']++;
			}
		}

		function eliminar_sesion ()
		{
			session_start()
			unset($_SESSION['count']);
		}
		?>



<?	
	/* funcion para insertar valores en las tablas excepto las relacionales, auditor, componente y auditorias*/
    function insertar($tabla,$val,$conexion){
		mysql_query('INSERT INTO $tabla values (null, $val,1)',$conexion)
	}
	/* insertar un componente, se debe pasar el nombre del componente, la caracteristica, la descripcion y la concexion a la base de datos*/
	function insertar_componente($componente,$caracteristica,$descripcion,$conexion){
		mysql_query('INSERT INTO 8COMPONENTES VALUES (null,$componente,$caracteristica,$descripcion,1',$conexion)
	}

	/*insertar un nuevo auditor, pasar nombre, apeelido, usuario, contraseña, id de teamleader y los privilegios, tambien pasar la conexion*/
	function insertar_auditores($nombre,$apellido, $usuario, $password, $teamlead, $privilegios,$conexion)
			mysql_query('INSERT INTO 9auditores values(null,$nombre,$apellido, $usuario, $password, $teamlead, $privilegios,1',$conexion)
	}



	#prueba para importar datos de un csv para la tabla auditorias
	function auditorias(){
			//conexiones, conexiones everywhere
			ini_set('display_errors', 1);
			error_reporting(E_ALL);
			$db_host = 'HOST DONDE ESTA LA BBDD';
			$db_user = 'USUARIO DE LA BBDD';
			$db_pass = 'CLAVE DEL USUARIO DE LA BBDD';
			 
			$database = 'NOMBRE DE LA BBDD';
			$table = 'TABLA QUE VAMOS A INTRODUCIR';
			if (!@mysql_connect($db_host, $db_user, $db_pass))
			    die("No se pudo establecer conexión a la base de datos");
			 
			if (!@mysql_select_db($database))
			    die("base de datos no existe");
			    if(isset($_POST['submit']))
			    {
			        //Aquí es donde seleccionamos nuestro csv
			         $fname = $_FILES['sel_file']['name'];
			         echo 'Cargando nombre del archivo: '.$fname.' <br>';
			         $chk_ext = explode(".",$fname);
			 
			         if(strtolower(end($chk_ext)) == "csv")
			         {
			             //si es correcto, entonces damos permisos de lectura para subir
			             $filename = $_FILES['sel_file']['tmp_name'];
			             $handle = fopen($filename, "r");
			 
			             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			             {
			               //Insertamos los datos con los valores...
			                $sql = "INSERT into TABLA(CAMPOS SEPARADOS POR COMAS) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]',...)";
			                mysql_query($sql) or die('Error: '.mysql_error());
			             }
			             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
			             fclose($handle);
			             echo "Importación exitosa!";
			         }
			         else
			         {
			            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
			//ver si esta separado por " , "
			             echo "Archivo invalido!";
			         }
			    }

	}


?>