<?php 

	class Pokemon extends Conectar{
		public function getTodosPokemon(){
			$conectar = parent::conexion();
			parent::set_names();
			$sql = "SELECT * FROM pokemon";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getPokemonPorID($id){
			$conectar = parent::conexion();
			parent::set_names();
			$sql = "SELECT * FROM pokemon WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function insertPokemon($nombre, $numero, $tipo){
			$conectar = parent::conexion();
			parent::set_names();
			$sql = "INSERT INTO pokemon(id, nombre, numero, tipo) VALUES (NULL, ?, ?, ?);";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $nombre);
			$sql->bindValue(2, $numero);
			$sql->bindValue(3, $tipo);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updatePokemon($id, $nombre, $numero, $tipo){
			$conectar = parent::conexion();
			parent::set_names();
			$sql = "UPDATE pokemon SET nombre = ?, numero = ?, tipo = ? WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $nombre);
			$sql->bindValue(2, $numero);
			$sql->bindValue(3, $tipo);
			$sql->bindValue(4, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function deletePokemon($id){
			$conectar = parent::conexion();
			parent::set_names();
			$sql = "DELETE FROM pokemon WHERE id = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $id);
			$sql->execute();
			return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>