<?php
	class PedidoExpress extends MongoHandler{
		public $Origen, $Destino, $Telefono, $Estado, $Fecha;

		public function __construct($origen, $destino, $telefono){
			$this -> Destino = $destino;
			$this -> Estado = FALSE;
			$this -> Origen = $origen;
			$this -> Telefono = $telefono;
			$this -> Fecha = new DateTime();
			$this -> conectar();
			$this -> setDB("TaxiOnline");
			$this -> setCollections("PedidosExpress");
		}
		
		public function Guardar(){
			try {				
				return $this -> insert(
					array(
						"Destino" => $this->Destino,
						"Estado" => $this->Estado,
						"Origen" => $this->Origen,
						"Telefono" => $this->Telefono,
						"Fecha" => $this->Fecha
					)
				);				
			} catch (Exception $e) {
				throw new RuntimeException("Error al reservar :C " . $e);
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
		
		public function Borrar($_id){
			return $this -> delete(
				array("_id" => new MongoId($_id))
			);
		}
		
		public function Actualizar($valores, $_id){
			return $this -> update(
				array("_id" => new MongoId($_id)),
				$valores
			);
		}
		
		public function toJson(){
			return json_encode($this);
		}
	}
?>