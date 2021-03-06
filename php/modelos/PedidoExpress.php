<?php
	class PedidoExpress extends MongoHandler{
		
		private $Origen, $Destino, $Telefono, $Estado, $Fecha, $Zonas;

		public function __construct($origen = null, $destino = null, $telefono = null, $zonas = null){
			$this -> Destino = $destino;
			$this -> Estado = FALSE;
			$this -> Origen = $origen;
			$this -> Telefono = $telefono;
			$this -> Fecha = new DateTime();
			$this->Zonas = $zonas;
			$this -> conectar();
			$this -> setCollections("PedidosExpress");
		}
		
		public function getPedidos($campos = null){
			if (is_null($campos)){
				return $this -> get(array("Estado" => FALSE), array("Zonas" => 1, "Usuario" => 1));
			}else{
				return $this -> get(
					$campos,
					array("Destino" => 1, "Fecha.date" => 1, "Origen" => 1, "Tomado" => 1)
				);
			}
		}
		
		public function getPedido($id){
			return $this -> getOne(
				array("Estado" => TRUE, "_id" =>$id), 
				array("Destino" => 1, "Origen" => 1, "Telefono" => 1)
			);
		}
		
		public function setEstado($id){
			//Se entiende queda terminado Estado = true
			$reserva = $this -> getOne(array("_id" => $id));
			if($reserva["Estado"]){
				//Alguien ya lo tomo
				return array("Mensaje" => "Reserva tomada por otra empresa");
			}else{
				$this->update(
					array("_id" => $id), 
					array('$set' => array(
						"Estado" => TRUE,
						"Tomado" => $_SESSION["Usuario"]
						)
					)
				);
				return $this -> getPedido($id);
			}
		}

		public function setCancela($id){
			$reserva = $this -> getOne(array("_id" => $id));
			if($reserva["Estado"]){
				//Alguien ya lo tomo
				return array("Mensaje" => "Reserva tomada por empresa");
			}else{
				$this -> delete(
					array("_id" => $id)
				);
				return array('Mensaje' => "Reserva Cancelada");
			}
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
				$valores = array(
						"Destino" => $this->Destino,
						"Estado" => $this->Estado,
						"Origen" => $this->Origen,
						"Telefono" => $this->Telefono,
						"Fecha" => $this->Fecha,
						"Zonas" => $this->Zonas
					);
					if(isset($_SESSION["Mail"])){
						$valores["Usuario"] = $_SESSION["Mail"];
						$valores["Evaluado"] = FALSE;
					}
				return $this -> insert($valores);
			} catch (Exception $e) {
				throw new RuntimeException("Error al reservar :( ) " . $e);
			}
		}
		
		public function toJson(){
			return json_encode($this);
		}
	}
?>