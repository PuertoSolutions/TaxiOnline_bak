<?php
	class MongoHandler{
		
		protected $m = NULL;
		protected $db = NULL;
		protected $col = NULL;
				
		protected function conectar(
			$host = "localhost", 
			$puerto = "27017",
			$usuario = NULL, $pass = NULL) {
			try {
				$connS = (is_null($usuario && $pass)) ? 
					"mongodb://$usuario:$pass@$host:$puerto/TaxiOnline" : 
					"mongodb://$host:$puerto/TaxiOnline";
				$this -> m = new Mongo($connS, array("persist" => "x"));				
			} catch (Exception $e) {
				throw new RuntimeException("No es posible conectar a: mongodb://$host:$puerto". $e);
			}
		}
		
		protected function setDB($db){
			$this -> db = $this -> m -> selectDB($db);
		}
		
		protected function setCollections($col){
			$this -> col = $this -> db -> selectCollection($col);
		}
		
		protected function insert($document){
			$this -> col -> insert($document);
		}
	}
?>