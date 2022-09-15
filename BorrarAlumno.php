<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
	// Declaracion De Variables
	$ncontrol = 0;
	
	// Asignacion De Valores A Variables Desde El Formulario	
	$ncontrol = $_GET["ncontrol"];

	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "root");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Instruccion SQL Para ELIMINAR Registros
	$sql =  "DELETE FROM alumnos WHERE ncontrol=$ncontrol";
		
	// Elimina Un Registro, Regresa 1 Si Elimino Correctamente y 0 En Caso Contrario
	$elimino = mysqli_query($conexion, $sql);

	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);
	
	if( $elimino > 0 ){	
		// Redirecciona A La Pagina EliminarAlumno.php
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="REFRESH" content="0;url=EliminarAlumno.php">';
		echo '</head>';
		echo '</html>';	
	}
	else{
		echo 'Error: NO Se Elimino Correctamente La Informacion';
	}
?>
</body>
</html>
