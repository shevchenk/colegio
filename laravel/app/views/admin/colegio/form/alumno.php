<!-- /.modal -->
<div class="modal fade" id="alumnoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header logo">
                <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title">Alumnos</h4>
            </div>
            <div class="modal-body">
                <form id="form_alumnos_total" name="form_alumnos_total" action="" method="post">
                    <table name='t_alumno_total' id='t_alumno_total' class="table table-bordered">
                        <thead><tr></tr></thead>
                        <tbody></tbody>
                        <tfoot><tr></tr></tfoot>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"
                data-toggle="modal" data-target="#personaModal" data-titulo="Nuevo" >Nuevo</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
