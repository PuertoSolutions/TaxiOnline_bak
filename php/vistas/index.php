<?php
	if(isset($_SESSION["Perfil"])){
		if($_SESSION["Perfil"] == "Empresa"){
			require "Empresa/Pedidos.php";
		}else{
			echo "MOSTRAR ALGO";
		}
	}else{
		echo "Hola !";
	}
?>