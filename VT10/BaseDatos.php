<?php 

	function crearConexion() {

		// Datos de conexión
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "noticias";

		// Establecemos la conexión con la base de datos
		$conexion = mysqli_connect($host, $user, $password, $database);

		return $conexion;
	}

	function anadirNoticia($titulo, $cuerpo, $autor) {
		$DB = crearConexion();

		$sql = "INSERT INTO noticias (Titulo, Cuerpo, Autor) 
				VALUES ('" . $titulo . "', '" . $cuerpo . "', '" . $autor . "')";

		$result = mysqli_query($DB, $sql);

		if ($result) {
			return $result;
		} else {
			echo "Error al crear noticia.";
		} 
		mysqli_close($DB);
	}

	function actualizarFichero(){
		$DB = crearConexion();

		$actualizacion = date("d") . "-" . date("m") . "-" . date("Y");
		$xml = new DOMDocument("1.0", "UTF-8");
		$diario = $xml -> createElement("diario");
		$xml -> appendChild($diario);
		$actualizado = $xml -> createElement("ultimaActualizacion", $actualizacion);
		$diario -> appendChild($actualizado);
		$noticias = $xml -> createElement("noticias");
		$diario -> appendChild($noticias);

		$sql = "SELECT * FROM noticias";
		$result = mysqli_query($DB, $sql);
		while ($fila = mysqli_fetch_array($result)) {
			$noticia = $xml -> createElement("noticia");
			$titulo = $xml -> createElement("titulo", $fila["Titulo"]);
			$cuerpo = $xml -> createElement("cuerpo", $fila["Cuerpo"]);
			$autor = $xml -> createElement("autor", $fila["Autor"]);
			$noticia -> appendChild($titulo);
			$noticia -> appendChild($cuerpo);
			$noticia -> appendChild($autor);
			$noticias -> appendChild($noticia);
		}

		mysqli_close($DB);

		$xml -> formatOutput = true;
		$xml -> save("info/info.xml");

	}

	function ultimaNoticia(){
		$DB = crearConexion();
		
		$sql = "SELECT * FROM noticias WHERE ID = (SELECT MAX(ID) FROM noticias)";
		$result = mysqli_query($DB, $sql);
		mysqli_close($DB);
		$fila = mysqli_fetch_array($result);
		
		$html = new DOMDocument();
		$html -> loadHTML("<!DOCTYPE html><html><body></body></html>"); // Para importar y exportar de un HTML5
		$titulo = $html -> createElement("h1", $fila["Titulo"]);
		$cuerpo = $html -> createElement("p", $fila["Cuerpo"]);
		$autor = $html -> createElement("h3", $fila["Autor"]);
		$body = $html -> getElementsByTagName("body")[0];
		$body -> appendChild($titulo);
		$body -> appendChild($cuerpo);
		$body -> appendChild($autor);

		$html -> formatOutput = true;
		$html -> saveHTMLFile("info/info.html"); // Guardar en HTML
	}


?> 