<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Documento sin titulo</title>
</head>

<body>
<?php
	$usuario = $_POST["txtUsuario"];
	$clave = $_POST["txtClave"];
	
	// Crear La Conexion a MySQL
	$conexion = mysqli_connect("localhost", "root", "root");
	
	// Seleccionar La Base De Datos
	mysqli_select_db($conexion, "alumnosDB");
	
	// Crear Una Instruccion SQL Para INSERTAR Registros
	$sql = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$clave')";
		
	// Inserta Un Registro, Regresa 1 Si Inserto Correctamente y 0 En Caso Contrario
	mysqli_query($conexion, $sql);	

	// Cierra La Conecion A La Base De Datos
	mysqli_close($conexion);	
		
	// Redirecciona A La Pagina FormularioLogin.html
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="REFRESH" content="0;url=index.html">';
	echo '</head>';
	echo '</html>';	
?>
</body>
</html>
