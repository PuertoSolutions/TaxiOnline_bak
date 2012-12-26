<?php
	class MongoHandler{
		
		protected $m = NULL;
		protected $db = NULL;
		protected $col = NULL;
				
		protected function conectar() {
			$connS = "";
			try {			
				$connS = ($_ENV["modo"] == "p") ? 
					"mongodb://admin:VSlQ6VSbi9PC@127.13.111.1:27017/TaxiOnline" : 
					"mongodb://localhost:27017/TaxiOnline";
				$this -> m = new Mongo($connS);
				$this->db = $this->m->selectDB("TaxiOnline");
			} catch (Exception $e) {
				throw new RuntimeException("No es posible conectar a: $connS ". $e);
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
			return "Pedido Registrado con ID: ". $document['_id'];
		}
		
		protected function get($criterio = NULL){
			$cursor = (is_null($criterio)) ? 
				$this -> col ->find() :
				$this -> col ->find($criterio);
			$k = array(); $i = 0;
			while ($cursor -> hasNext()) {
				$k[$i] = $cursor -> getNext();
				$i++;
			}
			return $k;
		}
		
		protected function update($criterio, $valores){
			return $this -> col -> update($criterio, $valores);
		}
		
		protected function delete($criterio, $one = FALSE){
			return $this -> col -> remove($criterio, $one);
		}
		
		protected function ensureIndex($criterio){
			return $this -> col -> ensureIndex($this -> col, $criterio);
		}
		
		protected function getOne($criterio){
			return $this->col->findOne($criterio);
		}
	}
?>