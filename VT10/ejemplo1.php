<?php 

function crearArchivo() {
	$nombre = "Buenos días clase";
	// Creo un nuevo fichero.
	$xml = new DOMDocument("1.0", "UTF-8");
	// Creo un elemento
	$usuarios = $xml -> createElement("usuarios");
	// Lo establezco como elemento raiz.
	$xml -> appendChild($usuarios);
	// Creo nuevo elemento
	$nodo_creado = $xml -> createElement("creado", $nombre);
	// Añado al elemento raiz el nuevo elemento
	$usuarios -> appendChild($nodo_creado);
	// Establezdo el valor del formato de salida.
	$xml -> formatOutput = true;
	// Guardo el fichero.
	$xml -> save("xml/clientes.xml");
}


crearArchivo();
echo "Ejecutado";

?>