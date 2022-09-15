<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Baja De Alumnos</title>
</head>

<body>
<?php
	$listaEspecialidades = array("Especialidad ...", "Ingenieria en Sistemas Computacionales","Soporte y Mantenimiento","Administracion","Contabilidad","Logistica");
	$listaGrados = array("Grado ...", "1","2","3","4","5","6");
	$listaGrupos = array("Grupo ...","A","B","C","D","E","F","G","H");	
	$strTurno = "";
	$pasatiempos="";
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Consulta SQL
	$sql = "SELECT * FROM Alumnos";
	
	// Ejecuta La Consulta Guardando El Resultado En La Variable $registros
	$registros = mysqli_query($conexion, $sql);

	echo '<h1><center><<< Eliminar Alumnos >>></center></h1>';
	
	// Crea Una Tabla(html) Con Los Campos De La Tabla Alumnos Como Encabezado
	echo '<table border="2" width="100%">';
	echo '<tr style="font-style:italic">';
	echo '	<td>No. Control</td>';
	echo '	<td>Nombre Del Alumno</td>';
	echo '	<td>Especialidad</td>';
	echo '	<td>Grado</td>';
	echo '	<td>Grupo</td>';
	echo '	<td>Turno</td>';
	echo '	<td>Pasatiempos</td>';
	echo '	<td>Observaciones</td>';
	echo '  <td>Accion</td>';	
	echo '</tr>';
	
	// Muestra Cada Registro De La Tabla Alumnos, Creando Un Nuevo Renglon En La Tabla
	while( $registro = mysqli_fetch_array($registros) ){ 
		if($registro['turno'] == 1){
			$strTurno = "Matutino";
		}
		else{
			$strTurno = "Vespertino";
		}	
		
		$pasatiempos = "";
		if ( $registro['pasatiempo1'] == 1){
			$pasatiempos = $pasatiempos."Deportes/";
		}
		if ( $registro['pasatiempo2'] == 1){
			$pasatiempos = $pasatiempos."Musica/";
		}
		if ( $registro['pasatiempo3'] == 1){
			$pasatiempos = $pasatiempos."Internet/";
		}
		if ( $registro['pasatiempo4'] == 1){
			$pasatiempos = $pasatiempos."Lectura/";
		}
								
		echo '<tr>';
		echo '	<td>'.$registro['ncontrol'].'</td>';
		echo '	<td>'.$registro['nombre'].'</td>';
		echo '	<td>'.$listaEspecialidades[$registro['especialidad']].'</td>';
		echo '	<td>'.$listaGrados[$registro['grado']].'</td>';
		echo '	<td>'.$listaGrupos[$registro['grupo']].'</td>';
		echo '	<td>'.$strTurno.'</td>';
		echo '	<td>'.$pasatiempos.'</td>';
		echo '	<td>'.$registro['observaciones'].'</td>';
		echo '  <td><a href="BorrarAlumno.php?ncontrol='.$registro['ncontrol'].'">Eliminar</a></td>';
		echo '</tr>';
	}
	echo '</table>';
	
	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);
?>
<div align="right"><a href="Principal.html">Ir A Principal</a></div>
</body>
</html>
