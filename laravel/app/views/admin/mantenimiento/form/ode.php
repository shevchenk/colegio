<!-- /.modal -->
<div class="modal fade" id="odeModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header logo">
				<button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-close"></i>
				</button>
				<h4 class="modal-title">Nueva Ode</h4>
			</div>
			<div class="modal-body">
				<form id="form_odes" name="form_odes" action="" method="post">
					<div class="form-group">
						<label class="control-label">Nombre
							<a id="error_nombre" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Nombre" name="txt_nombre" id="txt_nombre">
					</div>

					<div class="form-group">
						<label class="control-label">Departamento:</label>
						<select class="form-control" name="slct_departamento_id" id="slct_departamento_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Provincia:</label>
						<select class="form-control" name="slct_provincia_id" id="slct_provincia_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Distrito
						<a id="error_distrito_id" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Seleccione Distrito">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<select class="form-control" name="slct_distrito_id" id="slct_distrito_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Direcci&oacute;n
							<a id="error_direccion" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Direcci&oacute;n">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Direcci&oacute;n" name="txt_direccion" id="txt_direccion">
					</div>

					<div class="form-group">
						<label class="control-label">Tel&eacute;fono
							<a id="error_telefono" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Tel&eacute;fono">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Tel&eacute;fono" name="txt_telefono" id="txt_telefono">
					</div>

					<div class="form-group">
						<label class="control-label">Estado:</label>
						<select class="form-control" name="slct_estado" id="slct_estado">
							<option value='0'>Inactivo</option>
							<option value='1' selected>Activo</option>
						</select>
					</div>

					<div class="form-group">
						<button type="button" class="btn btn-success btn-xs btnAgregarDistrito">Agregar Distrito</button>
					</div>

					<table class="table tblDetalle">
						<thead>
							<tr>
								<th>Departamento</th>
								<th>Provincia</th>
								<th>Distrito</th>
								<th>[]</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-sm">Guardar</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->
