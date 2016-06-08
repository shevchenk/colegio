<!-- /.modal -->
<div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header logo">
				<button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
					<i class="fa fa-close"></i>
				</button>
				<h4 class="modal-title">Detalle Colegio</h4>
			</div>
			<div class="modal-body">
				<form id="form_detalle" name="form_detalle" action="" method="post">

					<div class="form-group">
						<input type="text" class="form-control" name="txt_colegio_id" id="txt_colegio_id">
						<button type="button" class="btn btn-success btn-xs btnAgregar">Agregar</button>
					</div>

					<table class="table tblDetalle">
						<thead>
							<tr>
								<th>Grado</th>
								<th>Secci&oacute;n</th>
								<th>Nivel</th>
								<th>Turno</th>
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
				<button type="button" class="btn btn-primary btn-sm" onclick="procesoDetalle()">Guardar</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->
