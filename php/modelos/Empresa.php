<?php

	class Empresa extends MongoHandler {
		private $Nombre, $Mail, $Pass, $Contacto, $Estado;
		private $url = "http://www.random.org/strings/?num=1&len=8&digits=off&upperalpha=on&loweralpha=on&unique=on&col=2&format=plain&rnd=new";
		
		function __construct($nombre, $mail = null, $pass = null, $contacto = null) {
			$this->Nombre = $nombre;
			$this->Mail = $mail;
			$this->Pass = $pass;
			$this->Contacto = $contacto;
			$this->Estado = "Espera";
			$this->conectar();
			$this->setCollections("Empresa");
		}
		
		public function getEmpresas($criterio = null, $campos = null){
			return $this->get($criterio, $campos);
		}
		
		public function ActualizarEmpresa($id, $estado, $nombre_sistema){
			try{
				$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $this->url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$this->update(
						array("_id" => $id), 
						array('$set' => array(
							"Contacto" => $this->Contacto,
							"Estado" => $estado,
							"NombreSistema" => $nombre_sistema,
							"Pass" => str_replace("\n", "", curl_exec($ch))
							)
						)
					);
					$this->col->ensureIndex(array("NombreSistema" => 1), array("unique" => TRUE));
					curl_close($ch);
					return array("Mensaje" => "Valores Actualizados!", 
						"Detalle" => "Los datos se han guardado.", "Tiempo" => 5000);
			}catch(Exception $e){
				throw new RuntimeException("Error al Guardar Permisos: $e");
			}
		}
		
		public function putGuardar(){ return $this->Guardar(); }
		private function Guardar(){
			try{
				$existe = $this->getOne(array("Nombre" => $this->Nombre));
				if (empty($existe)) {
					$this->insert(
						array(
							"Nombre" => $this->Nombre,
							"Contacto" => $this->Contacto,
							"Estado" => $this->Estado
						)
					);
					$this->col->ensureIndex(array("Nombre" => 1), array("unique" => TRUE));
					return array("Mensaje" => "Empresa Ingresada!", 
						"Detalle" => "Los datos se han guardado. <br />
							En breve nos comunicaremos con la persona ingresada.", "Tiempo" => 10000);
				} else {
					return array("Mensaje" => "Empresa ya existe con ese Nombre !", 
						"Detalle" => "El nombre ingresado ya se encuentra en uso :( ", "Tiempo" => 3000);
				}
			}catch(Exception $e){
				throw new RuntimeException("Error al Registrar Empresa: $e");
			}
		}
		
		public function getLogin(){ return $this->Login(); }
		private function Login(){
			try{
				$existe = $this->getOne(array("NombreSistema" => $this->Nombre));
				if(empty($existe)){
					return array("Mensaje" => "Usuario No Existe!", 
						"Detalle" => "Comprueba el Nombre de Usuario entregado... escribiste bien ?", "Tiempo" => 3000);
				}else{
					if($existe["Pass"] == $this->Pass){
						if($existe["Estado"] == "Activo"){
							$_SESSION["Usuario"] = $existe["NombreSistema"];
							$_SESSION["Perfil"] = "Empresa";
							return array("Mensaje" => "Redirigiendo", "Detalle" => "", "Tiempo" => 2000);
						}else{
							return array("Mensaje" => "Cuenta no activa", "Detalle" => "Aún no activamos tu cuenta.", "Tiempo" => 2000);
						}
					}else{
						return array("Mensaje" => "Pass Incorrecta", "Detalle" => "Escribe bien...", "Tiempo" => 2000);
					}
				}
			}catch(Exception $e){
				throw new RuntimeException("Error al Iniciar Sesi&oacute;n: $e");
			}
		}
	}
	
?>