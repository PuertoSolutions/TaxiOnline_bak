<h1>Pedidos Pendientes</h1>
<p>
	Aquí puedes revisar los pedidos que aún no has calificado. <br />
	La idea de calificar las reservas es puntuar a las empresas para dar a conocer a los usuarios cuáles son mejores que otras en relación a la puntuación.
</p>
<p>
	También, puede darse el caso que quieras cancelar un pedido... en ese caso, lo puedes hacer desde aquí.
</p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Origen</th>
			<th>Destino</th>
			<th>Tomado por Empresa</th>
		</tr>
	</thead>
	<tbody>
<?php
	require "modelos/PedidoExpress.php";
	$pedidos_express = new PedidoExpress();
	$listado = $pedidos_express -> getPedidos(array("Usuario" => $_SESSION["Mail"], "Evaluado" => FALSE));
	if(empty($listado)){
		//NADA
	}else{
		foreach ($listado as $item) {
			echo "<tr class=\"clickeable\" id=\"".$item["_id"]."\" >";
			echo "<td>".$item["Fecha"]["date"]."</td>";
			echo "<td>".$item["Origen"]."</td>";
			echo "<td>".$item["Destino"]."</td>";
			echo (array_key_exists("Tomado", $item)) ? "<td>".$item["Tomado"]."</td>" : "<td>Nadie :(</td ";
			echo "</tr>";
		}
	}
?>
	</tbody>
</table>