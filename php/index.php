<?php	
	require 'lib/Slim/Slim.php';
	require 'views/Vista.php';
	
	\Slim\Slim::registerAutoloader();
	
	$vista = new Vista();
		
	$app = new \Slim\Slim(
		array("view" => $vista)
	);
	
	Vista::set_layout("default.php");
	
	$app -> get('/Registro', function() use ($app){
		$app -> render("registro.php");
	});
	
	$app -> get('/Pedido', function() use ($app){
		$app -> render("pedido.php");
	});
	
	$app -> get('/', function() use ($app){
		$app -> render("index.php");
	});
	
	$app -> get('/phpinfo', function() use ($app){
		echo phpinfo();
	});
	
	$app -> post('/PedidoExpress', function() use($app){
		require "models/PedidoExpress.php";
		$pedidoEx = new PedidoExpress(
			$app -> request() ->params("origen"),
			$app -> request() ->params("destino"),
			$app -> request() ->params("telefono")
		);
		echo var_dump($pedidoEx -> Guardar());
	});
	
	$app -> run();
?>