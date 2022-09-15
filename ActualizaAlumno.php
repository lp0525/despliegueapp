<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actualizacion De Alumnos</title>
</head>

<body>
<?php
	// Declaracion De Variables
	$ncontrol = 0;
	$nombre = "";
	$especialidad = 0;
	$grado = 0;
	$grupo = 0;
	$turno = 0;
	$pasatiempo1 = 0;
	$pasatiempo2 = 0;
	$pasatiempo3 = 0;
	$pasatiempo4 = 0;
	$observaciones = "";
	
	// Asignacion De Valores A Variables Desde El Formulario
	if(  isset($_REQUEST["ncontrol"])) {
		$ncontrol = $_REQUEST["ncontrol"];
	}	
	if(  isset($_REQUEST["nombre"])) {
		$nombre = $_REQUEST["nombre"];
	}
	if (isset( $_REQUEST["especialidades"] ) ){
		$especialidad = $_REQUEST["especialidades"];
	}
	if( isset($_REQUEST["grado"]) ){
		$grado = $_REQUEST["grado"];
	}
	if( isset($_REQUEST["grupo"]) ){
		$grupo = $_REQUEST["grupo"];
	}
	if( isset($_REQUEST["turno"]) ){
		$turno = $_REQUEST["turno"];
	}
	if ( isset($_REQUEST["deportes"])){
		$pasatiempo1 = 1;
	}
	if ( isset($_REQUEST["musica"])){
		$pasatiempo2 = 1;
	}
	if ( isset($_REQUEST["internet"])){
		$pasatiempo3 = 1;
	}
	if ( isset($_REQUEST["lectura"])){
		$pasatiempo4 = 1;
	}
	if( isset($_REQUEST["observaciones"]) ){
		$observaciones = $_REQUEST["observaciones"];
	}
	
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "root");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Instruccion SQL Para ACTULIZAR Registros
	$sql = "UPDATE Alumnos SET 
			Nombre='$nombre',
			Especialidad=$especialidad,
			Grado=$grado,
			Grupo=$grupo,
			Turno=$turno,
			Pasatiempo1=$pasatiempo1,
			Pasatiempo2=$pasatiempo2,
			Pasatiempo3=$pasatiempo3,
			Pasatiempo4=$pasatiempo4,									
			Observaciones='$observaciones'
			WHERE NControl=$ncontrol";
		
	// Inserta Un Registro, Regresa 1 Si Inserto Correctamente y 0 En Caso Contrario
	$actualizo = mysqli_query($conexion, $sql);

	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);
		
	if( $actualizo > 0 ){
		// Redirecciona A La Pagina ActualizarAlumno.php
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="REFRESH" content="0;url=ActualizarAlumno.php">';
		echo '</head>';
		echo '</html>';	
	}
	else{
		echo 'Error: NO Se Actualizo La Informacion';
	}
?>
</body>
</html>
