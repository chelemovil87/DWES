<?php

	include "baseDatos.php";

	class Metodos {

		public function saluda() {
			return "Hola";
		}

		public function ciudadMasPoblada() {
			$listadoCiudades = ciudadMasPobladaEnBD();
			$fila = mysqli_fetch_array($listadoCiudades);
			$ciudad = $fila["Name"];
			return $ciudad; 
		}
	}

?>