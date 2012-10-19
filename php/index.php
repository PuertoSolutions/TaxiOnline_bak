<?php	
	require 'lib/Slim/Slim.php';
	require 'views/Vista.php';
	
	session_cache_limiter(false);
	session_start();
	
	\Slim\Slim::registerAutoloader();
	
	$vista = new Vista();
		
	$app = new \Slim\Slim(
		array("view" => $vista)
	);
	
	Vista::set_layout("default.php");
	
	$app -> get('/Registro', function() use ($app){
		$app -> render("registro.php");
	});
	
	$app -> get('/PedidoExpress', function() use ($app){
		$app -> render("pedidoexpress.php");
	});
	
	$app -> get('/', function() use ($app){
		$app -> render("index.php");
	});
	
	$app -> get('/phpinfo', function() use ($app){
		echo phpinfo();
	});
	
	$app -> get('/Querys/:data', function($data) use ($app){
		switch ($data) {
			case "Calles":{
				require "models/Calles.php";
				$calles = new Calles();
				echo json_encode($calles -> Consultar());
				break;
			}			
			
			default:
				;
			break;
		}
	});
	
	$app -> post('/PedidoExpress', function() use($app){
		require "models/PedidoExpress.php";
		require "models/Calles.php";
		$pedidoEx = new PedidoExpress(
			$app -> request() ->params("origen") . " " .$app -> request() -> params("onumero"),
			$app -> request() ->params("destino") . " " .$app -> request() -> params("dnumero"),
			$app -> request() ->params("telefono")
		);
		$calles = new Calles( array(
			array("Calle" => strtolower(($app -> request() ->params("origen")))),
			array("Calle" => strtolower($app -> request() ->params("destino")))
		));
		$data = array(
			"Mensaje" => print_r($pedidoEx -> Guardar(), TRUE),
			"Detalle" => "La empresa que acepte tu pedido deber&iacute;a 
				llamarte en un plazo no mayor a 15 minutos. <br /> 
				Puedes ver qué empresa ha tomado tu pedido en cualquier 
				momento usando el identificador entregado. <br />"
		);
		$calles -> Guardar(); 
		$app->render("avisos.php", $data);
	});
	
	$app -> run();
?>