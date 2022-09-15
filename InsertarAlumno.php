<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Alta De Alumnos</title>
</head>

<body>
<?php
	$listaEspecialidades = array("Especialidad ...", "Ingenieria en Sistemas Computacionales","Soporte y Mantenimiento","Administracion","Contabilidad","Logistica");
	$listaGrados = array("Grado ...", "1","2","3","4","5","6");
	$listaGrupos = array("Grupo ...","A","B","C","D","E","F","G","H");	
	$strTurno = "";
	$pasatiempos="";
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "root");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Consulta SQL
	$sql = "SELECT * FROM alumnos";
	
	// Ejecuta La Consulta Guardando El Resultado En La Variable $registros
	$registros = mysqli_query($conexion, $sql);

	echo '<h1><center><<< Inserta Alumnos >>></center></h1>';
	
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
			$pasatiempos = $pasatiempos."Deportes";
		}
		if ( $registro['pasatiempo2'] == 1){
			$pasatiempos = $pasatiempos."Musica/";
		}
		if ( $registro['pasatiempo3'] == 1){
			$pasatiempos = $pasatiempos."Internet/";
		}
		if ( $registro['pasatiempo4'] == 1){
			$pasatiempos = $pasatiempos."Lectura";
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
		echo '  <td></td>';
		echo '</tr>';
	}
	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);	
		
	// Crea Un Renglon Al Final De La Consulta, Para Insertar Campos Desde El Formulario
	echo '<form id="form1" name="form1" method="post" action="GuardarAlumno.php">';
    echo '<tr>';
	echo '	<td valign="top"><input name="ncontrol" type="text" id="ncontrol" size="10" maxlength="8" /></td>';
	echo '	<td valign="top"><input name="nombre" type="text" id="nombre" size="20" maxlength="50" /></td>';
    echo '  <td valign="top">';
    echo '  	<input type="radio" name="especialidades" value="1" />'.$listaEspecialidades[1].'<br />';
    echo '      <input type="radio" name="especialidades" value="2" />'.$listaEspecialidades[2].'<br />';
    echo '      <input type="radio" name="especialidades" value="3" />'.$listaEspecialidades[3].'<br />';
    echo '      <input type="radio" name="especialidades" value="4" />'.$listaEspecialidades[4].'<br />';
    echo '      <input type="radio" name="especialidades" value="5" />'.$listaEspecialidades[5];	
	echo '	</td>';
    echo '  <td valign="top">';
    echo '		<select name="grado" id="grado">';
    echo '		<option value="0" selected="selected">Grado ...</option>';
    echo '      <option value="1">Semestre I</option>';	
    echo '      <option value="2">Semestre II</option>';
    echo '      <option value="3">Semestre III</option>';
    echo '      <option value="4">Semestre IV</option>';
    echo '      <option value="5">Semestre V</option>';
    echo '      <option value="6">Semestre VI</option>';
    echo '    	</select>';
    echo '  	</td>';
    echo ' 	<td valign="top">';
	echo '  	<select name="grupo" size="3" id="grupo">';
    echo '    	<option value="0" selected="selected">Grupo ...</option>';
    echo '    	<option value="1">Grupo A</option>';	
    echo '    	<option value="2">Grupo B</option>';
    echo '    	<option value="3">Grupo C</option>';
    echo '    	<option value="4">Grupo D</option>';
    echo '    	<option value="5">Grupo E</option>';
    echo '    	<option value="6">Grupo F</option>';
    echo '   	<option value="7">Grupo G</option>';
    echo '    	<option value="8">Grupo H</option>';
    echo '  	</select>';
	echo '	</td>';
    echo '  <td valign="top">';
    echo '    	<input name="turno" type="radio" value="1" />Matutino<br />';
    echo '  	<input name="turno" type="radio" value="2" />Vespertino';
	echo '	</td>';
    echo '  <td valign="top">';
    echo '    	<input name="deportes" type="checkbox" id="deportes" value="1" />Deportes<br />';
    echo '    	<input name="musica" type="checkbox" id="musica" value="1" />Musica<br />';
    echo '    	<input name="internet" type="checkbox" id="internet" value="1" />Internet<br />';
    echo '   	<input name="lectura" type="checkbox" id="lectura" value="1" />Lectura';
	echo '	</td>';
	echo '	<td valign="top"><textarea name="observaciones" cols="20" rows="5" id="observaciones"></textarea></td>';
    echo '  <td valign="top"><input name="enviar" type="submit" id="enviar" value="Enviar" /></td>';
    echo '</tr>';
	echo '</form>';
	echo '</table>';

?>
<div align="right"><a href="Principal.html">Ir A Principal</a></div>
</body>
</html>
