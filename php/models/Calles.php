<?php
	class Calles extends MongoHandler{
		
		private $Calles;

		public function __construct($calles = NULL){
			$this -> Calles = $calles;
			$this -> conectar();
			$this -> setDB("TaxiOnline");
			$this -> setCollections("Calles");
		}
		
		public function Guardar(){
			try {
				$this -> col -> batchInsert($this -> Calles, array('continueOnError' => true));
			} catch (Exception $e) {
				#throw new RuntimeException("Error al reservar :C " . $e);
			}
		}
		
		public function Consultar($_id = NULL){
		try {
			return (is_null($_id)) ? 
				$this -> get() : 
				$this -> get(
					array("_id" => new MongoId($_id))
				);
			} catch (Exception $e) {
				throw new RuntimeException("Error al consultar :C " . $e);
			}
		}
				
		public function toJson(){
			return json_encode($this);
		}
	}
?>