<script type="text/javascript">
$(document).ready(function() {
    $("#form_convenio").append("<input type='hidden' id='txt_colegio_id' name='txt_colegio_id' value=''>");
    $("#form_convenio").append("<input type='hidden' id='txt_id' name='txt_id' value=''>");

    $('#convenioModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var id = button.data('id');

        modal.find('.modal-title').text('Convenio');
        $('#form_convenio [data-toggle="tooltip"]').css("display","none");
        $("#form_convenio input").val('');
        $("#form_convenio #txt_colegio_id").val(id);

        ListarConvenios();

        modal.find('.modal-footer .btn-primary').text('Guardar');
        modal.find('.modal-footer .btn-primary').attr('onClick','GuardarC();');

    });

    $(".fechas").daterangepicker(
        {
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true
        }
    );

});

GuardarC=function(){
    var data=$("#form_convenio").serialize().split("txt_").join("").split("slct_").join("");
    Colegios.GuardarConvenios(ListarConvenios,data);
}

ListarConvenios=function(){
    var data={colegio_id:$("#form_convenio #txt_colegio_id").val()};
    Colegios.ListarConvenios(ListarConveniosHTML,data);
}

ListarConveniosHTML=function(datos){
    $("#txt_fecha_inicio").val(datos.fecha_inicio);
    $("#txt_fecha_termino").val(datos.fecha_termino);
    $("#txt_suscribe").val(datos.suscribe);
    $("#txt_cargo").val(datos.cargo);
    $("#txt_trabajador_id").val(datos.trabajador_id);
    $("#txt_trabajador").val(datos.trabajador);
    $("#txt_id").val(datos.id);
}
</script>
