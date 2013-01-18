<?php
	if(isset($_SESSION["Perfil"])){
		if($_SESSION["Perfil"] == "Empresa"){
			require "Empresa/Pedidos.php";
		}else{
			require "Usuario/MisPedidos.php";
		}
	}else{
		require "Bienvenida.php";
	}
?>