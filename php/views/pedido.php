<form class="form-horizontal" method="post" action="/PedidoExpress">
	<fieldset>
		<div id="legend">
			<legend>Pedido</legend>
		</div>
		<div class="control-group">
			<label class="control-label" for="origen">Origen</label>
			<div class="controls">
				<input type="text" name="origen" class="input-xlarge">
				<p class="help-block">D&oacute;nde debe ir a buscarte el m&oacute;vil ?</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="destino">Destino</label>
			<div class="controls">
				<input type="text" name="destino" class="input-xlarge">
				<p class="help-block">D&oacute;nde debe llevarte el m&oacute;vil?</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telefono">Tel&eacute;fono</label>
			<div class="controls">
				<input type="text" name="telefono" class="input-xlarge">
				<p class="help-block">Para confirmar t&uacute; pedido</p>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-success">Go !</button>
			</div>
		</div>
	</fieldset>
</form>