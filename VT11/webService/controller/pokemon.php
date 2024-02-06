<?php 

	header('Content-Type: application/json');

	require_once("../config/config.php");
	require_once("../models/Pokemon.php");

	$categoria = new Pokemon();

	// Recibimos los valores enviados desde el cliente
	$body = json_decode(file_get_contents("php://input"), true);

	switch ($_GET["op"]) {
		case "GetAll":
			$datos = $categoria->getTodosPokemon();
			echo json_encode($datos);
		break;

		case "GetID";
			$datos = $categoria->getPokemonPorID($body["id"]);
			echo json_encode($datos);
		break;

		case "Insert";
			$datos = $categoria->insertPokemon($body["nombre"], $body["numero"], $body["tipo"]);
			echo "Insert Correcto";
		break;

		case "Update";
			$datos = $categoria->updatePokemon($body["id"], $body["nombre"], $body["numero"], $body["tipo"]);
			echo "Update Correcto";
		break;

		case "Delete";
			$datos = $categoria->deletePokemon($body["id"]);
			echo "Delete Correcto";
		break;
	}
?>