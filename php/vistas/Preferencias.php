<?php 
	if(isset($_SESSION["Usuario"])){ ?>
	<form class="form-horizontal" action="/Usuario/Preferencias" method="post">
		<fieldset>
			<div id="legend" class=""><legend class="">Mis Preferencias</legend></div>
			<div class="control-group">
				<label class="control-label">Tema</label>
				<div class="controls">
					<select class="input-xlarge" id="selectTemas" name="Tema">
						<option>default</option>
						<option>cerulean</option>
						<option>cosmo</option>
						<option>cyborg</option>
						<option>journal</option>
						<option>readable</option>
						<option>simplex</option>
						<option>slate</option>
						<option>spacelab</option>
						<option>spruce</option>
						<option>superhero</option>
						<option>united</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-success">Guardar</button>
				</div>
			</div>
		</fieldset>
	</form>
	<script type="text/javascript" src="/assets/js/preferencias.js"></script>
<?php }else{ ?>
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Ammm !</strong> No tienes permiso para estar aquí :C 
	</div>
<?php } ?>