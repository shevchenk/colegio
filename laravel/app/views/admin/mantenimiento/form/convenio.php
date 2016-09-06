<!-- /.modal -->
<div class="modal fade" id="convenioModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_convenio" name="form_convenio" action="" method="post">
          <fieldset>
            <legend>Datos personales</legend>
            <div class="row form-group">
              <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">Fecha Inicio
                  </label>
                  <input type="text" class="form-control fechas" placeholder="Ingrese fecha inicio" name="txt_fecha_inicio" id="txt_fecha_inicio">
                </div>
                <div class="col-sm-4">
                  <label class="control-label">Fecha Termino
                  </label>
                  <input type="text" class="form-control fechas" placeholder="Ingrese fecha termino" name="txt_fecha_termino" id="txt_fecha_termino">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">Quien Suscribe
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Quien Suscribe" name="txt_suscribe" id="txt_suscribe">
                </div>
                <div class="col-sm-4">
                  <label class="control-label">Cargo Quien Suscribe
                  </label>
                  <input type="text" class="form-control" placeholder="Ingrese Cargo Quien Suscribe" name="txt_cargo" id="txt_cargo">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6">
                    <label class="control-label">Trabajador:</label>
                    <input class="form-control" type="hidden" name="txt_trabajador_id" id="txt_trabajador_id">
                    <input class="form-control" type="text" name="txt_trabajador" id="txt_trabajador" readonly>
                </div>
                <div class="col-sm-1">
                    <label class="control-label"></label>
                    <a class="form-control btn btn-primary" onClick="Mostrar('tra');" id="buscar" name="buscar">
                        <i class="fa fa-lg fa-search"></i>
                    </a>
                </div>
              </div>
              <div class="col-sm-12">
                    <div id="div_trabajador" class="box row table-responsive" style="display:none">
                        <table id="t_trabajador" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th> [ ] </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
