<?php
	class PedidoExpress extends MongoHandler{
		
		private $Origen, $Destino, $Telefono, $Estado, $Fecha, $Zonas;

		public function __construct($origen, $destino, $telefono, $zonas){
			$this -> Destino = $destino;
			$this -> Estado = FALSE;
			$this -> Origen = $origen;
			$this -> Telefono = $telefono;
			$this -> Fecha = new DateTime();
			$this->Zonas = $zonas;
			$this -> conectar();
			$this -> setCollections("PedidosExpress");
		}
		
		public function putPedido(){return array(
					"Mensaje" => print_r($this-> Guardar(), TRUE),
					"Detalle" => "La empresa que acepte tu pedido deber&iacute;a
						llamarte en un plazo no mayor a 15 minutos. <br />
						Puedes ver qu&eacute; empresa ha tomado tu pedido en cualquier
						momento usando el identificador entregado. <br />",
						"Tiempo" => 15000
					);}
		private function Guardar(){
			try {				
				return $this -> insert(
					array(
						"Destino" => $this->Destino,
						"Estado" => $this->Estado,
						"Origen" => $this->Origen,
						"Telefono" => $this->Telefono,
						"Fecha" => $this->Fecha,
						"Zonas" => $this->Zonas
					)
				);
			} catch (Exception $e) {
				throw new RuntimeException("Error al reservar :() " . $e);
			}
		}
		
		public function toJson(){
			return json_encode($this);
		}
	}
?>