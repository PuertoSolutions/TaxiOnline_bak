<div class="row">
	<div class="span12">
		<!-- <img alt="Mapa General" src="assets/img/iqq_general.png"> -->
		<p><img id="image1" border="0" src="assets/img/iqq_general.png" style="width:1353px;height:512px" /><p>
	</div>
</div>
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
<style type="text/css">
	.magnifyarea{ /* CSS to add shadow to magnified image. Optional */
		box-shadow: 5px 5px 7px #818181;
		-webkit-box-shadow: 5px 5px 7px #818181;
		-moz-box-shadow: 5px 5px 7px #818181;
		filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=5, offY=5, positive=true);
		background: white;
	}
</style>
<script type="text/javascript" src="assets/js/featuredimagezoomer.js">
/***********************************************
* Featured Image Zoomer (w/ adjustable power)- By Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/
</script>
<script type="text/javascript">
jQuery(document).ready(function($){
	/* $('#image1').addimagezoom({
		zoomrange: [3, 10],
		magnifiersize: [300,300],
		magnifierpos: 'right',
		cursorshade: true,
		largeimage: 'assets/img/iqq_general.png' //<-- No comma after last option!
	}) */
	$('#image1').addimagezoom({})
})

</script>