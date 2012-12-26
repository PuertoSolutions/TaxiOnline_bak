<div class="row">
	<div class="span6">
		<h2>Empresas por Validar</h2>
		<form class="form" action="/Admin/Empresa/Permisos" method="post" id="permisos">
			<table class="table">
				<thead>
					<tr>
						<th>Activo</th>
						<th>ID Empresa</th>
						<th>Nombre</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'Modelos/Empresa.php';
						$empresas = new Empresa(null);
						foreach ($empresas->getEmpresas(array("Estado" => "Espera")) 
							as $empresa) {
							echo "<tr>";
							echo "<td><button type=\"button\" class=\"btn\" name=\"permiso\" 
								id=\"".$empresa["_id"]."\" data-toggle=\"button\">Validar</button></td>";
							echo "<td>".$empresa["_id"]."</td>";
							echo "<td>".$empresa["Nombre"]."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<input type="hidden" name="aValidar" id="aValidar"/>
			<button class="btn btn-success">Guardar</button>
		</form>
	</div>
</div>
<script src="/assets/js/administracion.js" type="text/javascript"></script>