<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Servicio Web</title>
</head>
<body>

	<?php

		$opciones = array("location" => "http://localhost/DWES/VT09/servicio.php", "uri" => "http://localhost/DWES/VT09/");
		$cliente = new SoapClient(null, $opciones);

		echo $cliente->saluda();

		echo "<br>";
		
		echo $cliente->ciudadMasPoblada();

	?>


</body>
</html>