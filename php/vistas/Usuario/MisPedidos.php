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
			<th>Tipo Pedido</th>
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
			echo (array_key_exists("Tomado", $item)) ? 
				"<td class=\"tomado\">".$item["Tomado"]."</td>" : 
				"<td>Nadie :(</td> ";
			echo "<td class=\"tipo\">Express</td>";
			echo "</tr>";
		}
	}
?>
	</tbody>
</table>
<?php
	if (empty($listado)) {
		//Nada
	}else{
?>
<div class="modal hide fade" id="modalPedido">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Detalle Pedido</h3>
	</div>
	<div class="modal-body">
		<h4>Cancelar</h4>
		<div id="borrar">
			<div class="alerta alert alert-info hide">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				El pedido se encuentra en curso. <br />
				No puedes cancelarlo.
			</div>
			<div class="confirma alert alert-block hide">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Eliminar Pedido</h4>
				&iquest;Realmente quieres eliminarlo?<br />
				<button class="btn" id="CancelarPedido" data-id="" data-tipo="" >Eliminar</button>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	</div>
</div>
<script type="text/javascript" src="/assets/js/mispedidos.js"></script>
<?php
	}
?>