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
					<div id="rootwizard">
						<div class="navbar">
							<div class="navbar-inner">
								<div class="container">
									<ul>
										<li><a href="#tab1" data-toggle="tab">Fecha y Hora</a></li>
										<li><a href="#tab2" data-toggle="tab">Second</a></li>
										<li><a href="#tab3" data-toggle="tab">Third</a></li>
										<li><a href="#tab4" data-toggle="tab">Forth</a></li>
										<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
										<li><a href="#tab6" data-toggle="tab">Sixth</a></li>
										<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div id="bar" class="progress progress-striped active">
							<div class="bar"></div>
						</div>
						<div class="tab-content">
							<div class="tab-pane" id="tab1">
								1
							</div>
							<div class="tab-pane" id="tab2">
								2
							</div>
							<div class="tab-pane" id="tab3">
								3
							</div>
							<div class="tab-pane" id="tab4">
								4
							</div>
							<div class="tab-pane" id="tab5">
								5
							</div>
							<div class="tab-pane" id="tab6">
								6
							</div>
							<div class="tab-pane" id="tab7">
								7
							</div>
							<ul class="pager wizard">
								<li class="previous first" style="display:none;"><a href="#">First</a></li>
								<li class="previous"><a href="#">Previous</a></li>
								<li class="next last" style="display:none;"><a href="#">Last</a></li>
								<li class="next"><a href="#">Next</a></li>
							</ul>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="origen">Fecha</label>
						<div class="controls">
							<div class="input-append date" id="dp1" data-date="<?php echo date("d-m-Y"); ?>" 
								data-date-format="dd-mm-yyyy">
								<input class="span2" size="16" type="text" value="<?php echo date("d-m-Y"); ?>" 
									name="fecha">
								<span class="add-on"><i class="icon-th"></i></span>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="origen">Horario</label>
						<div class="controls">
							<input class="timepicker-2" type="text" style="width: 75px;" value="<?php echo date("H:i"); ?>"
                               name="horaInicio" readonly="readonly" id="tp1"/>
                        <i class="icon-time" style="margin: -2px 0 0 -22.5px; 
                           pointer-events: none; position: relative;"></i>
						</div>
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
	<link rel="stylesheet" href="/assets/css/datepicker.css">
	<link rel="stylesheet" href="/assets/css/timepicker.css">
	<script src="/assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap-timepicker.js" type="text/javascript"></script>
	<script src="/assets/js/wizard.min.js" type="text/javascript"></script>
	<script src="/assets/js/pedidoCompleto.js" type="text/javascript"></script>
<?php }else{ ?>
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Ammm !</strong> No tienes permiso para estar aquí :C 
	</div>
<?php } ?>