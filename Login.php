<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Acceso Al Sistema</title>
</head>

<body>
<?php
	$usuario = $_POST["txtUsuario"];
	$clave = $_POST["txtClave"];
	
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "root");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Consulta SQL De Acuerdo A Usuario y Contrase�a
	$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$clave'";
	
	// Ejecuta La Consulta Guardando El Resultado En La Variable $registros
	$registros = mysqli_query($conexion, $sql);
	
	// Extrae Un Registros De La Consulta Resultante ($registros)
	if( mysqli_fetch_array($registros) ){  // Regresa Verdadero Si Encontro Registro
		// Cierra La Conexion A La Base De Datos
		mysqli_close($conexion);	
	
		// Redirecciona A La Pagina Principal.html
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="REFRESH" content="0;url=Principal.html">';
		echo '</head>';
		echo '</html>';
	}
	else{
		// Cierra La Conexion A La Base De Datos
		mysqli_close($conexion);	

		// Redirecciona A La Pagina FormularioLogin.html				
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="REFRESH" content="0;url=index.html">';
		echo '</head>';
		echo '</html>';	
	}
?>
</body>
</html>
