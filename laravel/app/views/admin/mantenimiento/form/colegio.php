<!-- /.modal -->
<div class="modal fade" id="colegioModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header logo">
				<button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-close"></i>
				</button>
				<h4 class="modal-title">Nueva Colegio</h4>
			</div>
			<div class="modal-body">
				<form id="form_colegios" name="form_colegios" action="" method="post">

					<div class="form-group">
						<label class="control-label">Ode
							<a id="error_ode_id" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<select class="form-control" name="slct_ode_id" id="slct_ode_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Nombre
							<a id="error_nombre" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Nombre" name="txt_nombre" id="txt_nombre">
					</div>

					<div class="form-group">
						<label class="control-label">Tipo
							<a id="error_colegio_tipo_id" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<select class="form-control" name="slct_colegio_tipo_id" id="slct_colegio_tipo_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Nivel
							<a id="error_colegio_nivel_id" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<select class="form-control" name="slct_colegio_nivel_id" id="slct_colegio_nivel_id"></select>
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
						<a id="error_distrito_id" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<select class="form-control" name="slct_distrito_id" id="slct_distrito_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Direcci&oacute;n
							<a id="error_direccion" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Direcci&oacute;n" name="txt_direccion" id="txt_direccion">
					</div>

					<div class="form-group">
						<label class="control-label">Referencia
							<a id="error_referencia" style="display:none" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
								<i class="fa fa-exclamation"></i>
							</a>
						</label>
						<input type="text" class="form-control" placeholder="Ingrese Referencia" name="txt_referencia" id="txt_referencia">
					</div>

					<div class="form-group">
						<label class="control-label">Persona:</label>
						<select class="form-control" name="slct_persona_id" id="slct_persona_id"></select>
					</div>

					<div class="form-group">
						<label class="control-label">Telefono</label>
						<input type="text" class="form-control" placeholder="Ingrese Telefono" name="txt_telefono" id="txt_telefono">
					</div>

					<div class="form-group">
						<label class="control-label">Celular</label>
						<input type="text" class="form-control" placeholder="Ingrese Celular" name="txt_celular" id="txt_celular">
					</div>

					<div class="form-group">
						<label class="control-label">Estado:</label>
						<select class="form-control" name="slct_estado" id="slct_estado">
							<option value='0'>Inactivo</option>
							<option value='1' selected>Activo</option>
						</select>
					</div>

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
