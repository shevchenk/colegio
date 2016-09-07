<!-- /.modal -->
<div class="modal fade" id="seminarioModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">Seminario</h4>
      </div>
      <div class="modal-body">
        <form id="form_seminario" name="form_seminario" action="" method="post">
          <fieldset>
            <legend>Agregar Personas</legend>
            <div class="row form-group">
              <div class="col-sm-12">
                <div class="col-sm-4">
                  <a onClick='AgregarNuevoS();' class="btn btn-primary btn-lg">
                    <i class="fa fa-plus"></i>
                  </a>
                </div>
              </div>
              <div class="col-sm-12">
                    <div id="div_seminario" class="box row table-responsive">
                        <table id="t_seminario" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Persona</th>
                                    <th>Cargo</th>
                                    <th>Horario</th>
                                    <th>Fecha</th>
                                    <th>Celular</th>
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
