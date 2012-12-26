<?php

	$_ENV['modo'] = "p"; // {d="desarrollo", p="produccion"}
	
	require 'lib/Slim/Slim.php';
	require 'vistas/Vista.php';
	
	session_cache_limiter(FALSE);
	session_start();
	
	\Slim\Slim::registerAutoloader();
	
	$vista = new Vista();
	
	$app = new \Slim\Slim(
		array("view" => $vista)
	);
	
	Vista::set_layout("default.php");
	
	//------------------------------------------------------------------------GETS
	$app -> get('/', function() use ($app){
		$app -> render("index.php");
	});
	
	$app -> get('/phpinfo', function() use ($app){
		echo phpinfo();
	});
		
	
	$app -> get('/Admin', function() use ($app){
		$app -> render("Admin.php");
	});
		
	$app -> get('/Registro/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Usuario':{
				$app -> render("RegistroUsuario.php");
				break;
			}
			default:{ break ; }
		}
	});
	
	$app -> get('/Usuario/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Preferencias':{
				$app -> render("Preferencias.php");
				break;
			}
			case 'LogOut':{
				session_destroy();
				$app->render("avisos.php", array("Mensaje" => "", "Detalle" => "", "Tiempo" => 10));
				break;
			}
			default:{ break ; }
		}
	});
	
	$app -> get('/Reserva/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Express':{
				$app -> render("Express.php");
				break;
			}
			case 'Completo':{
				$app -> render("Completo.php");
				break;
			}
			case 'Calles':{
				require "modelos/Calles.php";
				$calles = new Calles();
				echo json_encode($calles -> Consultar());
				break;
			}
			default:{ break ; }
		}
	});
	
	$app->get('/Empresa/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Login':{
				$app -> render("Empresa/Login.php");
				break;
			}
			case 'Registro':{
				$app -> render("Empresa/Registro.php");
				break;
			}
			default:
				
				break;
		}
	});
	//------------------------------------------------------------------------POSTS
	
	$app -> post('/Registro/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Usuario':{
				require 'modelos/Usuario.php';
				$usuario = new Usuario(
					$app->request()->params("usuario"), 
					$app->request()->params("mail"), 
					$app->request()->params("pass")
				);
				$app->render("avisos.php", $usuario->putGuardar());
				break;
			}
			default:{ break ; }
		}
	});
	
	$app -> post('/Usuario/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Login':{
				require 'modelos/Usuario.php';
				$usuario = new Usuario(
					null, 
					$app->request()->params("mail"), 
					$app->request()->params("pass")
				);
				$app->render("avisos.php", $usuario->getLogin());
				break;
			}
			case 'Preferencias':{
				require 'modelos/Usuario.php';
				$usuario = new Usuario($_SESSION["Usuario"], $_SESSION["Mail"], null);
				$app->render("avisos.php", $usuario->setPreferencias(
					array(
						"Tema" => $app->request()->params("Tema")
						)
					)
				);
				break;
			}
			default:{ break ; }
		}
	});
	
	$app -> post('/Reserva/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Express':{
				require "modelos/PedidoExpress.php";
				require "modelos/Calles.php";
				$pedidoEx = new PedidoExpress(
					$app -> request() ->params("origen") . " " .$app -> request() -> params("numeroorigen"),
					$app -> request() ->params("destino") . " " .$app -> request() -> params("numerodestino"),
					$app -> request() ->params("telefono"),
					array(
						"Origen"=>$app->request()->params("zonaorigen"),
						"Destino"=>$app->request()->params("zonadestino")
					)
				);
				$calles = new Calles( array(
					array("Calle" => strtolower(($app -> request() ->params("origen")))),
					array("Calle" => strtolower($app -> request() ->params("destino")))
				));
				$calles->putCalles();
				$app->render("avisos.php", $pedidoEx->putPedido());
				break;
			}
			case 'Completo':{
				break;
			}
			default:{ break ; }
		}
	});
	
	$app -> post('/Empresa/:tipo', function($data) use ($app){
		switch ($data) {
			case 'Login':{
				require 'modelos/Empresa.php';
				$empresa = new Empresa(
					$app->request()->params("nombreempresa"),
					null,
					$app->request()->params("pass")
				);
				$app->render("avisos.php", $usuario->getLogin());
				break;
			}
			case 'Registro':{
				require 'modelos/Empresa.php';
				$empresa = new Empresa(
					$app->request()->params("nombreempresa"),
					null, null,
					array(
						"Nombre" => $app->request()->params("nombrecontacto"),
						"Mail" => $app->request()->params("mailcontacto"),
						"Telefono" => $app->request()->params("telefonocontacto"),
					)
				);
				$app->render("avisos.php", $empresa->putGuardar());
				break;
			}
			default:{ break ; }
		}
	});
	
	$app->post('/Admin/:Ente/:Actividad', function($ente, $act) use($app){
		switch ($ente) {
			case 'Empresa':{
				require 'modelos/Empresa.php';
				switch ($act) {
					case 'Permisos':{
						$empresas = new Empresa(null);
						$app->render("avisos.php", $empresas->setPermisos(
							json_decode($app->request()->params("aValidar")))
						);
						break;
					}
					default:
						
						break;
				}
				break;
			}
			default:
				
				break;
		}
	});
	
	$app -> run();
?>