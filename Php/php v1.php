<?php
class database 		
{
	private $usuario = "root";
	private	$contrasena = "";
	private	$servidor = "localhost";
	private	$basededatos = "framework";
	function conect_open(){
		$conexion=mysqli_connect($servidor,$usuario,$contrasena,$framework) or die("Error al conectar " . mysql_error())
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