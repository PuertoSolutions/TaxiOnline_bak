<?php
	class PedidoExpress extends MongoHandler{
		public $Origen, $Destino, $Telefono, $Estado, $Fecha;

		public function __construct($origen = NULL, $destino = NULL, $telefono = NULL){
			$this -> Destino = $destino;
			$this -> Estado = FALSE;
			$this -> Origen = $origen;
			$this -> Telefono = $telefono;
			$this -> Fecha = new DateTime();
		}
		
		public function Guardar(){
			$this -> conectar();
			$this -> setDB("TaxiOnline");
			$this -> setCollections("PedidosExpress");
			return $this -> insert(
				array(
					"Destino" => $this->Destino,
					"Estado" => $this->Estado,
					"Origen" => $this->Origen,
					"Telefono" => $this->Telefono,
					"Fecha" => $this->Fecha
				)
			);
		}
		
		public function toJson(){
			return json_encode($this);
			/*return json_encode(Array(
				"Origen" => $this -> Origen,
				"Destino" => $this -> Destino,
				"Telefono" => $this -> Telefono,
				"Estado" => $this -> Estado,
				"Fecha" => $this -> Fecha,
			));*/
		}
	}
?>