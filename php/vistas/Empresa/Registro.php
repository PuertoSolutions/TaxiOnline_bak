<div class="row">
	<div class="span12">
		<form class="form-horizontal" action="/Registro/Empresa" method="post">
    		<fieldset>
    			<div id="legend" class=""><legend class="">Nueva Empresa</legend></div>
		    	<div class="control-group">
		    		<label class="control-label" for="input01">Nombre</label>
		    		<div class="controls">
		    			<input type="text" placeholder="Nombre" required="required"
		    				class="input-xlarge" name="nombreempresa">
		    			<p class="help-block">Ejemplo: Radio Taxi Puerto Solutions</p>
	    			</div>
    			</div>
    			<div class="control-group">
    				<label class="control-label" for="input01">Persona Contacto</label>
    				<div class="controls">
    					<input type="text" placeholder="Contacto" required="required"
    						class="input-xlarge" name="nombrecontacto">
    					<p class="help-block">Para contactarnos con la empresa</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">E-Mail Contacto</label>
					<div class="controls">
						<input type="text" placeholder="E-Mail" required="required" 
							class="input-xlarge" name="mailcontacto">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Teléfono Contacto</label>
					<div class="controls">
						<input type="text" placeholder="Teléfono" required="required"
							class="input-xlarge" name="telefonocontacto">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>