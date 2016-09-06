<script type="text/javascript">
$(document).ready(function() {

    $('#seminarioModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var id = button.data('id');

        modal.find('.modal-title').text('Seminario');
        $('#form_seminario [data-toggle="tooltip"]').css("display","none");
        $("#form_seminario input[type='hidden']").remove();
        $("#form_seminario").append("<input type='hidden' id='txt_colegio_id' name='txt_colegio_id' value='"+id+"'>");

        ListarSeminarios();

        modal.find('.modal-footer .btn-primary').text('Guardar');
        modal.find('.modal-footer .btn-primary').attr('onClick','GuardarS();');
    });
});

AgregarNuevoS=function(){
    var tr='';
    tr+='<tr>';
    tr+='<td><input type="text" name="txt_persona[]"><input type="hidden" name="txt_id[]" value=""></td>';
    tr+='<td><input type="text" name="txt_cargo[]"></td>';
    tr+='<td><input type="text" name="txt_horario[]"></td>';
    tr+='<td><input class="fechas" type="text" name="txt_fecha[]"></td>';
    tr+='<td><input type="text" name="txt_celular[]"></td>';
    tr+='<td><a onClick="EliminarS(this);" class="btn btn-danger btn-sm"><i class="fa fa-remove fa-lg"></i></a></td>';
    tr+='</tr>';
    $("#t_seminario tbody").append(tr);
    $(".fechas").daterangepicker(
        {
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true
        }
    );
}

EliminarS=function(btn){
    $(btn.parentNode.parentNode).remove();
}

GuardarS=function(){
    var data=$("#form_seminario").serialize().split("txt_").join("").split("slct_").join("");
    Colegios.GuardarSeminarios(ListarSeminarios,data);
}

ListarSeminarios=function(){
    var data={colegio_id:$("#form_seminario #txt_colegio_id").val()};
    Colegios.ListarSeminarios(ListarSeminariosHTML,data);
}

ListarSeminariosHTML=function(obj){
    var html='';
    $('#t_seminario').dataTable().fnDestroy();
    $.each(obj.aData,function(index,data){
        html+='<tr>';
        html+='<td><input type="text" name="txt_persona[]" value="'+data.persona+'"><input type="hidden" name="txt_id[]" value="'+data.id+'"></td>';
        html+='<td><input type="text" name="txt_cargo[]" value="'+data.cargo+'"></td>';
        html+='<td><input type="text" name="txt_horario[]" value="'+data.horario+'"></td>';
        html+='<td><input class="fechas" type="text" name="txt_fecha[]" value="'+data.fecha+'"></td>';
        html+='<td><input type="text" name="txt_celular[]" value="'+data.celular+'"></td>';
        html+='<td><a onClick="EliminarS(this);" class="btn btn-danger btn-sm"><i class="fa fa-remove fa-lg"></i></a></td>';
        html+='</tr>';
    });

    $("#t_seminario>tbody").html(html); 
    $("#t_seminario").dataTable();
    $(".fechas").daterangepicker(
        {
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true
        }
    );
}
</script>
