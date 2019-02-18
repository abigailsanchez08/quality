<?php 
	include 'Conection.php';
	$datos=$_GET;
	$tabla = $_GET["tabla"];

	switch($tabla)
	{
		case 1:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE country SET Available = 0 where Id_Country = $id") or die(mysqli_error());
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
		case 2:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE service_line SET Available = 0 where Id_SL = $id") or die(mysqli_error());
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
		case 3:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE process SET Available = 0 where Id_Process = $id") or die(mysqli_error());
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
		case 4:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE transaction SET Available = 0 where Id_Transaction = $id") or die(mysqli_error());
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
		case 5:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE sub_transaction SET Available = 0 where Id_Sub_Transaction = $id") or die(mysqli_error());
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
		case 6:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE checks SET Available = 0 where Id_Check = $id") or die(mysqli_error());
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
		case 7:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE document_type SET Available = 0 where Id_Document_Type = $id") or die(mysqli_error());
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
		case 8:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE component SET Available = 0 where 	Id_Component = $id") or die(mysqli_error());
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
		case 9:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE rejection_type SET Available = 0 where Id_Rejection_Type = $id") or die(mysqli_error());
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
		case 10:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE privilege SET Available = 0 where Id_Privilege = $id") or die(mysqli_error());
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
		case 11:
			$id = $_GET["id"];
			echo $id;
			$result = mysqli_query($conexion,"UPDATE users SET Available = 0 where Id_User = $id") or die(mysqli_error());
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
		case 12:
			$id = $_GET["id"];
			$result = mysqli_query($conexion,"UPDATE team_leader SET Available = 0 where Id_Team_Leader = $id") or die(mysqli_error());
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
		default:
		break;
	}
 ?>