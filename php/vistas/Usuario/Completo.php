<?php
	if(isset($_SESSION["Usuario"])){ ?>
		<div class="row">
			<div class="span12">
			<h1>Pedido Completo</h1>
			<p>Iquique está dividido en 3 zonas:
				<ul>
					<li>Norte (Sector Marinero Desconocido hasta Diego Portales), color azúl.</li>
					<li>Centro (Entre Diego Portales y Chipana), color rojo.</li>
					<li>Sur (Desde Chipana a Ex-Ballenera), color verde.</li>
				</ul>
				Las cuales puedes ver en el mapa (click para agrandar).			
				</p>
			<p>
				<a href="/assets/img/Iquique_full.png" target="_blank"><img src="/assets/img/Iquique_thumb.png" /></a>
			<p>
			<p>Cuando realices un pedido, agrega la zona. De esta forma ayudas a las operadoras para que tu pedido sea revisado y respondido más rápido.</p>
			<p>Si quieres menos opciones utiliza el <a href="/Reserva/Express" target="_self"  >Formulario Express.</a></p>
		</div>
		<div class="span12">
			<form class="form-horizontal" method="post" action="/PedidoExpress">
				<fieldset>
					<div id="legend">
						<legend>Formulario Pedido</legend>
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
		</div>
	</div>
<script src="/assets/js/pedidso.js" type="text/javascript"></script>
<?php }else{ ?>
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Ammm !</strong> No tienes permiso para estar aquí :C 
	</div>
<?php } ?>