<?php
	function insertar_datos($conexion,$nombre,$apellido,$contraseña,$area){

		$sentencia = $conexion->prepare("INSERT INTO ejemplo (id,name, lastname, password, area) VALUES (null,?,?,?,?)");
		$sentencia->bind_param("ssss", $nombre,$apellido,$contraseña,$area);
		$sentencia->execute();
		/*
		$sentencia= "INSERT INTO ejemplo (id,name, lastname, password, area) VALUES (null,'$nombre','$apellido','$contraseña','$area')";
		$ejecutar = mysqli_query($conexion,$sentencia);
		return $ejecutar;*/
	}


	function exportar($conexion,$sql){
		// filename for export
		$csv_filename = 'db_export_'.'_'.date('Y-m-d').'.csv';
		// create empty variable to be filled with export data
		$csv_export = '';
		// query to get data from database
		$query = mysqli_query($conexion, $sql);
		$field = mysqli_field_count($conexion);
		// create line with field names
		for($i = 0; $i < $field; $i++) {
		    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
		}
		// newline (seems to work both on Linux & Windows servers)
		$csv_export.= '
		';
		// loop through database query and fill export variable
		while($row = mysqli_fetch_array($query)) {
		    // create line with field values
		    for($i = 0; $i < $field; $i++) {
		        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
		    }
		    $csv_export.= '
		';
		}
		// Export the data and prompt a csv file for download
		header("Content-type: text/x-csv");
		header("Content-Disposition: attachment; filename=".$csv_filename."");
		echo($csv_export);
	}
?>