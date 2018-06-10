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

            <div class="col-sm-6">
              <div class="col-sm-12">
                    <label class="control-label">Tipo Carrera</label>
                    <select class="form-control" name='slct_tipo_carrera' id='slct_tipo_carrera' onChange='CargarCarreras(this.value);'>
                        <option value=''>.::Seleccione::.</option>
                    </select>
              </div>
              <div class="col-sm-12">
                    <label class="control-label">Carrera</label>
                    <select class="form-control" name='slct_carrera' id='slct_carrera'>
                        <option value=''>.::Seleccione::.</option>
                    </select>
              </div>
              <div class="col-sm-12">
                    <label class="control-label">Monto</label>
                    <input type="text" class="form-control" placeholder="Ingrese Monto" name="txt_monto" id="txt_monto">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="col-sm-12">
                    <label class="control-label">Año que postula?</label>
                    <select class="form-control" name='slct_año' id='slct_año'>
                        <option value=''>.::Seleccione::.</option>
                        <?php 
                          for ($i=0; $i < 5; $i++) { 
                            $año=date('Y');
                            echo "<option value='".($año+$i)."'>".($año+$i)."</option>";
                          }
                        ?>
                    </select>
              </div>
              <div class="col-sm-12">
                    <label class="control-label">Tipo Universidad</label>
                    <select class="form-control" name='slct_tipo_universidad' id='slct_tipo_universidad'>
                        <option value=''>.::Seleccione::.</option>
                        <option value='1'>Privada</option>
                        <option value='2'>Pública</option>
                    </select>
              </div>
              <div class="col-sm-12">
                    <label class="control-label">Resultado del TEST</label>
                    <select class="form-control" name='slct_test' id='slct_test'>
                        <option value=''>.::Seleccione::.</option>
                        <option value='1'>A</option>
                        <option value='2'>B</option>
                        <option value='3'>C</option>
                        <option value='4'>D</option>
                        <option value='5'>E</option>
                        <option value='6'>F</option>
                        <option value='7'>G</option>
                        <option value='8'>H</option>
                    </select>
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
