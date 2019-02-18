<?php

	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "quality_framework";
	
	// creación de la conexión a la base de datos con mysqli_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password,$basededatos) or die ("No se ha podido conectar a la de Base de datos");
	
	// Selección del a base de datos a utilizar
?>