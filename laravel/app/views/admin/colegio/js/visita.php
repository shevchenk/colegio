<script type="text/javascript">
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','simple');
    slctGlobalHtml('slct_distrito','simple');
    $('.fechaDP').daterangepicker({
        format: 'YYYY-MM-DD',
        singleDatePicker:true,
        showDropdowns:true
    });

    $('.fechaDP').val('<?php echo date("Y-m-d");?>');
});

Cargar=function(evento,id){
    if( id=='' ){
        id=0;
    }

    if( evento=='dis' ){
        var data={ode:id};
        $('#slct_distrito').multiselect('destroy');
        slctGlobal.listarSlct('ode_distrito','slct_distrito','simple',null,data);
    }
    else if( evento=='col' ){
        var data={distrito:id};

    }
}

Mostrar=function(evento){
    if( evento=='col' ){
        if( $("#slct_ode").val()=='' ){
            alert('Seleccionar Ode');
        }
        else if( $("#slct_distrito").val()=='' ){
            alert('Seleccionar Distrito');
        }
        else{
            $("#div_colegio").show();
            Visita.Colegio(ColegioHTML);
        }
    }
    else if( evento=='cold' ){
        if( $("#txt_colegio_id").val()=='' ){
            alert('Busar y Seleccionar Colegio');
        }
        else{
            $("#div_colegio_detalle").show();
        }
    }
}

ColegioHTML=function(datos){
    var html='';
    $('#t_colegio').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.telefono+"</td>"+
            "<td>"+data.celular+"</td>"+
            "<td>"+data.direccion+"</td>"+
            '<td><a class="btn btn-primary btn-sm" id="colegio" data-id="'+data.id+'" data-nombre="'+data.nombre+'" data-titulo="" onClick="SeleccionarTable(this)">'+
                '<i class="fa fa-check fa-lg"></i> </a></td>';
        html+="</tr>";
    });

    if(html==''){
        $("#div_colegio").hide();
        $("#txt_colegio,#txt_colegio_id").val('');
    }

    $("#t_colegio>tbody").html(html); 
    $("#t_colegio").dataTable();
}

ColegioDetalleHTML=function(datos){
    var html='';
    $('#t_colegio_detalle').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        html+="<tr>"+
            "<td>"+data.grado+"</td>"+
            "<td>"+data.seccion+"</td>"+
            "<td>"+data.nivel+"</td>"+
            "<td>"+data.turno+"</td>"+
            '<td><label>'+
                '<input name="colegio_detalle[]" type="checkbox" value="'+data.id+'" data-nombre="'+data.grado+'° '+data.seccion+' | '+data.nivel+' '+data.turno+'" class="minimal" />'+
                '</label>';
        html+="</tr>";
    });

    $("#t_colegio_detalle>tbody").html(html); 
    $("#t_colegio_detalle").dataTable();
}

SeleccionarTable=function(ts){
    var id=$(ts).attr("data-id");
    var nombre=$(ts).attr("data-nombre");
    var idT=$(ts).attr("id");

    $("#div_"+idT).hide();

    $("#txt_"+idT).val(nombre);
    $("#txt_"+idT+"_id").val(id);
    if( idT=='colegio' ){
        Visita.ColegioDetalle(ColegioDetalleHTML);
    }
}

ValidarForm=function(){
    var r=true;
    if( $.trim($("#txt_fecha_visita").val())=="" ){
        r=false;
        alert('Seleccione una fecha');
    }
    else if( $.trim($("#slct_ode").val())=="" ){
        r=false;
        alert('Seleccione Ode');
    }
    else if( $.trim($("#slct_distrito").val())=="" ){
        r=false;
        alert('Seleccione Distrito');
    }
    else if( $.trim($("#txt_colegio_id").val())=="" ){
        r=false;
        alert('Busque y Seleccione Colegio');
    }
    else if( $("input[name='colegio_detalle']:checked").length==0 ){
        r=false;
        alert('Busque y Seleccione Colegio');
    }
    return r;
}

Guardar=function(){
    if( ValidarForm ){
        Visita.Crear(Limpiar);
    }
}

Limpiar=function(){
    $("#form_vista input").val('');
    $("#div_colegio").hide();
    $('#t_colegio_detalle').dataTable().fnDestroy();
    $("#t_colegio_detalle>tbody").html('');
    $("#slct_ode,#slct_distrito").val('');
    $('#slct_ode').multiselect('rebuild');
    $("#slct_ode").change();
    $('.fechaDP').val('<?php echo date("Y-m-d");?>');
}
</script>

