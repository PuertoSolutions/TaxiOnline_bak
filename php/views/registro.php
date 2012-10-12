<h1>Registro Usuarios</h1>
<p>Lo &uacute;nico que necesitamos es tu nombre (puede ser real o no), tu mail, y la contrase&ntilde;a.</p>
<form class="form-horizontal" method="post" action="/Registro">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="usuario">Nombre Usuario</label>
			<div class="controls">
				<input type="text" name="usuario" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="mail">E-Mail</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">@</span>
					<input type="text" name="mail" class="input-xlarge" id="prependedInput">
				</div>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="pass">Contrase&ntilde;a</label>
			<div class="controls">
				<input type="password" name="pass" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button class="btn btn-success">Registrar</button>
			</div>
		</div>
	</fieldset>
</form>