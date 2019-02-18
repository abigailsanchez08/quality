<?php
  session_start();
  require_once 'Conection.php';

  $usuario = $_POST['username'];
  $pass = $_POST['password'];
  $salt = md5($pass);
  $encript = crypt($pass, $salt);  

  $result = mysqli_query($conexion, "SELECT * FROM users WHERE Username ='" . $usuario . "'");
  if($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
    if($row['Password'] == $encript)
    {
      $_SESSION['usuario'] = 2;
      $_SESSION['loggedin'] = true;
      $_SESSION['nombre'] = $usuario;
      header("Location: Index.php");
    }else{
      header("Location: Index.php");
    }
  }else{
    header("Location: Index.php");
    exit();
  }
?>

