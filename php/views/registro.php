<h1>Registro Usuarios</h1>
<div class="row">
	<div class="span12">
		<p>Lo &uacute;nico que necesitamos es tu nombre (puede ser real o no), tu mail, y la contrase&ntilde;a.</p>
			<ul>
				<li>Cuando te registras, podemos guardar autom&aacute;gicamente las direcciones 
					frecuentes (si vas a cierto lugar siempre, no debes escribirlo cada vez).</li>
				<li>Tambi&eacute;n, puedes recibir alertas directamente en tu equipo (PC o SmartPhone), 
					sin necesidad de esperar una llamada para confirmar.</li>
				<li>Puedes puntuar y escribir rese&ntilde;as a las empresas de Radio Taxi.</li>
				<li>Cuando las empresas de Radio Taxis ven los pedidos, tienen prioridad los usuarios registrados.</li>
				<li>El registro es obligatorio para descargar la aplicaci&oacute;n para tu movil 
					(aunque puedes seguir usando la versi&oacute;n web sin problemas).</li>
			</ul>
	</div>
	<div class="span12">
		<br />
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
						<input type="text" name="mail" class="input-xlarge">
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
	</div>
</div>