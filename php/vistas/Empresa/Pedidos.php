<h1>Listado Pedidos</h1>
<p>
	Abajo puedes ver el listado de todos los pedidos realizados por los usuarios. <br />
	Los cuales se encuentran	ordenados por ingreso (Los más antiguos primero) y por calidad de usuario (Registrados primero).
</p>
<p>
	Únicamente se muestran las <a href="/assets/img/Iquique_full.png" target="_blank">Zonas</a>
	 del pedido, esto para que ustedes las empresas no se peleen por el mismo pedido :D <br />
	Si quieres ver el detalle del pedido, tienes que hacer click sobre éste.
</p>
<p>
	<div class="alert alert-error" style="font-size: 20px">
	    <p>
	    	<strong>Atención !</strong>
	    	Al ver el pedido completamente se entiende que tienes móviles disponibles para las zonas de origen y destino, <br />
	    	y que el tiempo de respuesta no es mayor a 15 minutos.
    	</p>
    	<p>
    		Recuerda que los usuarios pueden calificar los pedidos. Si el móvil se demora más de la cuenta, el usuario puede calificar negativamente el servicio. <br />
    		Tenemos un ranking, así que ten eso en cuenta.
    	</p>
	</div>
</p>
<?php
	require "modelos/PedidoExpress.php";
	$pedidos_express = new PedidoExpress();
	$pedidos_express = $pedidos_express -> getPedidos();
	if(empty($pedidos_express)){
		echo '<div class="alert alert-error" style="font-size: 20px"><strong>No se han encontrado pedidos :)</strong></div>';
	}else{
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Identificador</th>
			<th>Origen</th>
			<th>Destino</th>
		</tr>
	</thead>
	<tbody>
<?php
		foreach ($pedidos_express as $pedido) {
			echo "<tr id=\"".$pedido["_id"]."\" class=\"clickeable\" >";
			echo "<td>".$pedido["_id"]."</td>";
			echo "<td>".$pedido["Zonas"]["Origen"]."</td>";
			echo "<td>".$pedido["Zonas"]["Destino"]."</td>";
			echo "</tr>";
		}
?>
	</tbody>
</table>
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Detalle Pedido</h3>
	</div>
	<div class="modal-body">
		
  <form class="form-horizontal">
  	<fieldset>
  		<div class="control-group">
  			<label class="control-label" for="input01">Origen</label>
  			<div class="controls">
  				<input type="text" id="origen" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Destino</label>
			<div class="controls">
				<input type="text" id="destino" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Teléfono</label>
			<div class="controls">
				<input type="text" id="telefono" class="input-xlarge">
			</div>
		</div>
	</fieldset>
  </form>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
<script type="text/javascript" src="/assets/js/visor_pedidos.js"></script>
<?php
	}
?>