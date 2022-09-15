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
	$arrEspecialidad = array("Especialidad ...", "Ingenieria en Sistemas Computacionales","Soporte y Mantenimiento","Administracion","Contabilidad","Logistica");
	$arrGrado= array("Grado ...", "1","2","3","4","5","6");
	$actGrado = array("", "","","","","","");
	$arrGrupo = array("Grupo ...","A","B","C","D","E","F","G","H");	
	$actGrupo = array("", "", "", "", "", "", "", "", "");
	$arrEspecialidad = array("Especialidad ...", "Ingenieria en Sistemas Computacionales","Soporte y Mantenimiento","Administracion","Contabilidad","Logistica");
	$actEspecialidad = array("", "", "", "", "", "");
	$actDeportes="";
	$actMusica="";
	$actInternet="";
	$actLectura="";
	
	// Asignacion De Valores A Variables Desde El Formulario	
	$ncontrol = $_GET["ncontrol"];
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Consulta SQL
	$sql = "SELECT * FROM Alumnos WHERE ncontrol=$ncontrol";
	
	// Ejecuta La Consulta Guardando El Resultado En La Variable $registros
	$registros = mysqli_query($conexion, $sql);

	echo '<h1><center><<< Actualiza Alumnos >>></center></h1>';

	// Muestra Cada Registro De La Tabla Alumnos, Creando Un Nuevo Renglon En La Tabla
	if( $registro = mysqli_fetch_array($registros) ){
		// Codigo Para Activar Especialidad	
		$actEspecialidad[$registro['especialidad']] = "Checked";

		// Codigo Para Activar Grado
		$actGrado[$registro['grado']] = "Selected";	
		
		// Codigo Para Activar Grupo
		$actGrupo[$registro['grupo']] = "Selected";

		// Codigo Para Activar Turno
		if( $registro['turno'] == 1 ){
			$activarMat = "Checked";
			$activarVes = "";
		}
		else{
			$activarMat = "";
			$activarVes = "Checked";		
		}
		if($registro['pasatiempo1'] == 1){
			$actDeportes = "Checked";
		}	
		if($registro['pasatiempo2'] == 1){
			$actMusica = "Checked";
		}
		if($registro['pasatiempo3'] == 1){
			$actInternet = "Checked";
		}
		if($registro['pasatiempo4'] == 1){
			$actLectura = "Checked";
		}	
																						
		echo '
		<form id="form1" name="form1" method="post" action="ActualizaAlumno.php">
		  <table width="70%" border="2" align="center">
			<tr>
			  <td><div align="right">Numero De Control: </div></td>
			  <td colspan="4"><label>
				<input name="ncontrol" type="text" id="ncontrol" size="20" maxlength="8" value="'.$registro['ncontrol'].'" readonly="true">
			  </label></td>
			</tr>		  
			<tr>
			  <td width="20%"><div align="right">Nombre Del Alumno: </div></td>
			  <td colspan="4"><label>
				<input name="nombre" type="text" id="nombre" size="30" maxlength="50" value="'.$registro['nombre'].'">
			  </label></td>
			</tr>
			<tr>
			  <td valign="top"><div align="right">Especialidad:</div></td>
			  <td colspan="4" valign="top"><p>		  
				<label>
				  <input type="radio" name="especialidades" value="1" '.$actEspecialidad[1].' />'.$arrEspecialidad[1].'</label>
				<br />
				<label>
				  <input type="radio" name="especialidades" value="2" '.$actEspecialidad[2].'  />'.$arrEspecialidad[2].'</label>
				<br />
				<label>
				  <input type="radio" name="especialidades" value="3" '.$actEspecialidad[3].'  />'.$arrEspecialidad[3].'</label>
				<br />
				<label>
				  <input type="radio" name="especialidades" value="4" '.$actEspecialidad[4].'  />'.$arrEspecialidad[4].'</label>
				<br />
				<label>
				  <input type="radio" name="especialidades" value="5" '.$actEspecialidad[5].'  />'.$arrEspecialidad[5].'</label>
				<br />
			  </p></td>
			</tr>
			<tr>
			  <td valign="top"><div align="right">Grado/Grupo:</div></td>
			  <td width="7%" align="right" valign="top"><label>
				<select name="grado" id="grado">
				  <option value="1" '.$actGrado[1].'>Semestre I</option>
				  <option value="2" '.$actGrado[2].'>Semestre II</option>
				  <option value="3" '.$actGrado[3].'>Semestre III</option>
				  <option value="4" '.$actGrado[4].'>Semestre IV</option>
				  <option value="5" '.$actGrado[5].'>Semestre V</option>
				  <option value="6" '.$actGrado[6].'>Semestre VI</option>
				</select>
			  </label></td>
			  <td colspan="3" valign="top"><select name="grupo" size="3" id="grupo">
				<option value="1" '.$actGrupo[1].'>Grupo A</option>
				<option value="2" '.$actGrupo[2].'>Grupo B</option>
				<option value="3" '.$actGrupo[3].'>Grupo C</option>
				<option value="4" '.$actGrupo[4].'>Grupo D</option>
				<option value="5" '.$actGrupo[5].'>Grupo E</option>
				<option value="6" '.$actGrupo[6].'>Grupo F</option>
				<option value="7" '.$actGrupo[7].'>Grupo G</option>
				<option value="8" '.$actGrupo[8].'>Grupo H</option>
			  </select></td>
			</tr>
			<tr>
			  <td><div align="right">Turno:</div></td>
			  <td colspan="4"><label>
				<input name="turno" type="radio" value="1" '.$activarMat.' />
			  Matutino&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			  <input name="turno" type="radio" value="2" '.$activarVes.' />
			  Vespertino</label></td>
			</tr>
			<tr>
			  <td><div align="right">Pasatiempos:</div></td>
			  <td colspan="2"><label>
				<input name="deportes" type="checkbox" id="deportes" value="1"'.$actDeportes.' />
				Deportes
			  </label></td>
			  <td colspan="2" valign="top"><label>
				<input name="musica" type="checkbox" id="musica" value="1"'.$actMusica.'  />
			  Musica</label></td>
			</tr>
			<tr>
			  <td><div align="right"></div></td>
			  <td colspan="2"><label>
				<input name="internet" type="checkbox" id="internet" value="1"'.$actInternet.'  />
			  </label>
				Internet</td>
			  <td colspan="2" valign="top"><label>
				<input name="lectura" type="checkbox" id="lectura" value="1"'.$actLectura.'  />
			  </label>
				Lectura</td>
			</tr>
			<tr>
			  <td valign="top"><div align="right">Observaciones:</div></td>
			  <td colspan="4"><label>
				<textarea name="observaciones" cols="50" rows="5" id="observaciones" ></textarea>
			  </label></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4"><label>
				<input name="enviar" type="submit" id="enviar" value="Enviar" />
			  </label></td>
			</tr>
		  </table>
		</form>	';
	}

	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);	
?>
</body>
</html>
