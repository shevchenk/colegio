<!-- /.modal -->
<div class="modal fade" id="alumnoDetalleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">Alumno</h4>
      </div>
      <div class="modal-body">
        <form id="form_alumnos_detalle" name="form_alumnos_detalle" action="" method="post">
          <fieldset>
            <legend>Seleccione e ingrese su datos</legend>
            <div class="row form-group">

            <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">Tipo Carrera</label>
                  <select class="form-control" name='slct_tipo_carrera' id='slct_tipo_carrera' onChange='CargarCarreras(this.value);'>
                      <option value=''>.::Seleccione::.</option>
                  </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">Carrera</label>
                  <select class="form-control" name='slct_carrera' id='slct_carrera'>
                      <option value=''>.::Seleccione::.</option>
                  </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">Monto</label>
                  <input type="text" class="form-control" placeholder="Ingrese Monto" name="txt_monto" id="txt_monto">
                </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
