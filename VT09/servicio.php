<?php

	require "metodos.php";

	$opciones = array("uri" => "http://localhost/DWES/VT09/servicio.php");

	$servidor = new SoapServer(null, $opciones);

	$servidor -> setClass("Metodos");

	$servidor -> handle();

?>