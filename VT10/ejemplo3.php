<?php 

/*
	Ejemplo 3: Generar un fichero TXT a partir de una consulta a la base de datos con PHP

	Este programa conecta con la base de datos "world", obtiene los datos de la tabla "countrylanguage" y crea un documento "lenguas.txt" en el servidor con la información presentada.


*/

	function crearConexion() {

		// Datos de conexión
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "world";

		// Establecemos la conexión con la base de datos
		$conexion = mysqli_connect($host, $user, $password, $database);

		return $conexion;
	}


	
	$con = crearConexion();
	$salida = fopen("lenguas.txt", "w");  // Creamos/abrimos un fichero de salida
	$res = $con -> prepare("SELECT Language, Percentage FROM countrylanguage"); // Preparamos la consulta
	$res -> execute(); // La ejecutamos
	$res -> store_result(); // Obtenemos los resultados
	$res -> bind_result($lengua, $porcentaje); // Asociamos cada columna devuelta a un valor de variable
	fwrite($salida, "Porcentaje de uso de lenguas en el mundo:".PHP_EOL); // Empezamos a escribir en el fichero
	while($res -> fetch()){ // Por cada fila que hayamos obtenido de la consulta
		fwrite($salida, "La lengua " . $lengua . " tiene un uso del " . $porcentaje . "%.".PHP_EOL); // Escribimos en el fichero
	}
	fclose($salida); // Al terminar, cerramos el fichero
	mysqli_close($con); // Cerramos la conexion

	echo "Ejecutado"; // Mostramos un mensaje por pantalla

?>
	