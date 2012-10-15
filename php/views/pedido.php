<form class="form-horizontal" method="post" action="/PedidoExpress">
	<fieldset>
		<div id="legend">
			<legend>Pedido</legend>
		</div>
		<div class="control-group">
			<label class="control-label" for="origen">Origen</label>
			<div class="controls">
				<input type="text" id="origen" name="origen" class="input-xlarge">
				<input type="text" name="onumero" placeholder="N&uacute;mero" class="input-small">
				<p class="help-block">D&oacute;nde debe ir a buscarte el m&oacute;vil ?</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="destino">Destino</label>
			<div class="controls">
				<input type="text" id="destino" name="destino" class="input-xlarge">
				<input type="text" name="dnumero" placeholder="N&uacute;mero" class="input-small">
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
<script src="assets/js/pedido.js" type="text/javascript"></script>