<link href="/assets/css/bootstrap-toggle-buttons.css" rel="stylesheet">
<div class="row">
	<div class="span6">
		<h2>Listado Empresas</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID Empresa</th>
					<th>Nombre</th>
				</tr>
			</thead>
			<tbody>
<?php
	require '../Modelos/Empresa.php';
	$empresas = new Empresa(null);
	foreach ($empresas->getEmpresas(null, array("Nombre" => 1)) as $empresa) {
		echo '<tr id="'.$empresa["_id"].'" class="tr_click">';
		echo "<td>".$empresa["_id"]."</td>";
		echo "<td>".$empresa["Nombre"]."</td>";
		echo "</tr>";
	}
?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h2 id="NombreEmpresa"></h2>
	 	<form class="form-horizontal" action="/Admin/Empresa/Guardar" method="post">
			<fieldset>
				<div id="legend" class=""><legend class="" id="NombreEmpresa"></legend></div>
					<div class="control-group">
						<label class="control-label" for="input01">Nombre Contacto</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nombre_contacto" id="nombre_contacto">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">Mail Contacto</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="mail_contacto" id="mail_contacto" >
						</div>
					</div>
				    <div class="control-group">
				    	<label class="control-label" for="input01">Teléfono Contacto</label>
				    	<div class="controls">
				    		<input type="text"  class="input-xlarge" name="telefono_contacto" id="telefono_contacto">
						</div>
					</div>
				    <div class="control-group">
				    	<label class="control-label" for="input01">Nombre en Sistema</label>
				    	<div class="controls">
				    		<input type="text" class="input-xlarge" name="nombre_sistema" id="nombre_sistema" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="input01">Estado</label>
						<div class="controls">
							<div id="toggle-button">
								<input id="checkbox1" type="checkbox" value="value1" checked="checked" name="estado">
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-info">Guardar</button>
							<input type="hidden" id="id_empresa" name="id" />
							<input type="hidden" id="estado_empresa" name="estado" />
						</div>
					</div>
			</fieldset>
		</form>
	</div>
</div>
<script type="text/javascript" src="/assets/js/administracion.js"></script>
<script type="text/javascript" src="/assets/js/jquery.toggle.buttons.js"></script>