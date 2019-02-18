<?php 
	require_once 'Conection.php';
	$tabla = $_POST["tabla"];

	switch($tabla)
		{
			//Country
			case 1:

				$id_pais = $_POST['serie'];
				$nombre_pais = "'".$_POST["nombre_pais"]."'";
				//echo $id_pais ."****".$nombre_pais;
				$result = mysqli_query($conexion,"UPDATE country SET Country_Name = $nombre_pais where Id_Country = $id_pais") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Service Line
			case 2:
				$id_sl = $_POST['serie'];
				$nombre_sl = "'".$_POST["nombre_area"]."'";
				//echo $id_sl."--".$nombre_sl;
				$result = mysqli_query($conexion,"UPDATE service_line SET Service_Line_Name = $nombre_sl where Id_SL = $id_sl") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Process
			case 3:
				$id_process = $_POST['serie'];
				$nombre_process = "'".$_POST["nombre_proceso"]."'";
				//echo $id_process."--".$nombre_process;
				$result = mysqli_query($conexion,"UPDATE process SET Process_Name = $nombre_process where Id_Process = $id_process") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Transaction
			case 4:
				$id_transaction = $_POST['serie'];
				$nombre_transaction = "'".$_POST["nombre_transaccion"]."'";
				//echo $id_transaction."/".$nombre_transaction;
				$result = mysqli_query($conexion,"UPDATE transaction SET Transaction_Name = $nombre_transaction where Id_Transaction = $id_transaction") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Subtransaction
			case 5:
				$id_subtransaction = $_POST['serie'];
				$nombre_subtransaction = "'".$_POST["nombre_subtransaccion"]."'";
				//echo $id_subtransaction."/".$nombre_subtransaction;
				$result = mysqli_query($conexion,"UPDATE sub_transaction SET Sub_Transaction_Name = $nombre_subtransaction where Id_Sub_Transaction = $id_subtransaction") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Checks
			case 6:
				$id_check = $_POST['serie'];
				$nombre_check = "'".$_POST["nombre_check"]."'";
				//echo $id_check."/".$nombre_check;
				$result = mysqli_query($conexion,"UPDATE checks SET Check_Name = $nombre_check where Id_Check = $id_check") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//File Type
			case 7:
				$id_file = $_POST['serie'];
				$nombre_file = "'".$_POST["nombre_archivo"]."'";
				//echo $id_file."/".$nombre_file;
				$result = mysqli_query($conexion,"UPDATE document_type SET Document_Type_Name = $nombre_file where Id_Document_Type = $id_file") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Component
			case 8:
				$id_componente = $_POST['serie'];
				$nombre_componente = "'".$_POST["nombre_componente"]."'";
				//echo $id_componente."/".$nombre_componente;
				$result = mysqli_query($conexion,"UPDATE component SET Component_Name = $nombre_componente where Id_Component = $id_componente") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Rejection Type
			case 9:
				$id_rejection = $_POST['serie'];
				$nombre_rejection = "'".$_POST["rejection_name"]."'";
				//echo $id_rejection."/".$nombre_rejection;
				$result = mysqli_query($conexion,"UPDATE rejection_type SET Rejection_Type_Name = $nombre_rejection where Id_Rejection_Type = $id_rejection") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Privilege
			case 10:
				$id_privilege = $_POST['serie'];
				$nombre_privilege = "'".$_POST["nombre_privilegio"]."'";
				//echo $id_privilege."/".$nombre_privilege;
				$result = mysqli_query($conexion,"UPDATE privilege SET Privilege_Name = $nombre_privilege where Id_Privilege = $id_privilege") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Users
			case 11:
				$id_user = $_POST['serie'];
				$nombre_user = "'".$_POST["nombre_auditor"]."'";
				$apellido_user = "'".$_POST["apellido_auditor"]."'";
				$usuario = "'".$_POST["usuario"]."'";
				$pass = $_POST["password"];
	          	$salt = md5($pass);
	          	$password = crypt($pass, $salt);  
				//echo $id_user."/".$nombre_user."/".$apellido_user."/".$usuario."/".$password;
				$result = mysqli_query($conexion,"UPDATE users SET Name = $nombre_user, Lastname = $apellido_user, Username = $usuario, Password = $password where Id_User = $id_user") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Team Leader
			case 12:
				$id_team = $_POST['serie'];
				$nombre_team = "'".$_POST["nombre_team"]."'";
				$apellido_team = "'".$_POST["apellido_team"]."'";
				$email = "'".$_POST["email"]."'";
				//echo $id_team."/".$nombre_team."/".$apellido_team."/".$email;
				$result = mysqli_query($conexion,"UPDATE team_leader SET Name = $nombre_team, Lastname = $apellido_team, Email = $email where Id_Team_Leader = $id_team") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
			//Specialist
			case 13:
				$id_specialist = "'".$_POST['serie']."'";
				$nombre_specialist = "'".$_POST["nombre_specialist"]."'";
				$apellido_specialist = "'".$_POST["apellido_specialist"]."'";
				//echo $id_specialist."/".$nombre_specialist."/".$apellido_specialist;
				$result = mysqli_query($conexion,"UPDATE specialist SET Name = $nombre_specialist, Lastname = $apellido_specialist WHERE Id_Specialist = $id_specialist") or die(mysqli_error());
				if($result)
				{
					header("Location: insert.php");
				}
				else
				{
					header("Location: insert.php");
					echo "ha habido un error";
					exit();
				}
			break;
		}
 ?>