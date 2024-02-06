<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Publicar noticias</title>
</head>
<body>

	<h1>Publicar noticias</h1>

	<form action="ejemplo2.php" method="POST">
		<p><label>Titulo: </label><input type="text" name="titulo"></p>
		<p><label>Texto: </label><input type="text" name="cuerpo"></p>
		<p><label>Autor: </label><input type="text" name="autor"></p>
		<p><input type="submit" name="Publicar"></p>
	</form>

	<?php 
		include "BaseDatos.php";

		if (isset($_POST['Publicar'])) {
			if (anadirNoticia($_POST['titulo'], $_POST['cuerpo'], $_POST['autor'])) {
				echo "Noticia guardada";
				actualizarFichero();
				ultimaNoticia();
			}
		}

	?>

</body>
</html>