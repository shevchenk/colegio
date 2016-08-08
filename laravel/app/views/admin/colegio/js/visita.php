<script type="text/javascript">
var IdeGlobal={persona:''};// para crear objeto en arreglo e inicializarlo.
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','simple');
    slctGlobalHtml('slct_distrito','simple');
    $('.fechaDP').daterangepicker({
        format: 'YYYY-MM-DD HH:mm',
        singleDatePicker:true,
        showDropdowns:true,
        timePicker:true
    });

    $('.fechaDP').val('<?php echo date("Y-m-d H:i:s");?>');
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
    else if( evento=='pvi' ){
        IdeGlobal['persona']="";
        $("#div_persona").show();
        data={cargo_id:4};
        Visita.ColegioPersona(ColegioPersonaHTML,data);
    }
    else if( evento=='pte' ){
        IdeGlobal['persona']="t";
        $("#div_persona").show();
        data={cargo_id:5};
        Visita.ColegioPersona(ColegioPersonaHTML,data);
    }
}

ColegioPersonaHTML=function(datos){
    var html='';
    $('#t_persona').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        html+="<tr>"+
            "<td>"+data.paterno+"</td>"+
            "<td>"+data.materno+"</td>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.dni+"</td>"+
            '<td><a class="btn btn-primary btn-sm" id="persona" data-id="'+data.id+'" data-nombre="'+data.paterno+' '+data.materno+', '+data.nombre+' | DNI:'+data.dni+'" data-titulo="" onClick="SeleccionarTable(this,'+"'"+IdeGlobal['persona']+"'"+')">'+
                '<i class="fa fa-check fa-lg"></i> </a></td>';
        html+="</tr>";
    });

    if(html==''){
        $("#div_persona").hide();
        $("#txt_persona,#txt_persona_id").val('');
    }

    $("#t_persona>tbody").html(html); 
    $("#t_persona").dataTable();
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
            "<td><input type='text' name='colegio_detalle_ta[]' value='"+data.total_alumnos+"' disabled></td>"+
            '<td><label>'+
                '<input name="colegio_detalle[]" onChange="ActualizaTa(this);" type="checkbox" value="'+data.id+'" data-nombre="'+data.grado+'° '+data.seccion+' | '+data.nivel+' '+data.turno+'" class="minimal" />'+
                '</label>';
        html+="</tr>";
    });

    $("#t_colegio_detalle>tbody").html(html); 
    $("#t_colegio_detalle").dataTable();
}

ActualizaTa=function(t){
    if( $(t).is(":checked") ){
        $(t).closest("tr").find("td>input[type='text']").removeAttr("disabled");
    }
    else{
        $(t).closest("tr").find("td>input[type='text']").attr("disabled","true");
    }
}

SeleccionarTable=function(ts,ide){
    var id=$(ts).attr("data-id");
    var nombre=$(ts).attr("data-nombre");
    var idT=$(ts).attr("id");

    $("#div_"+idT).hide();

    $("#txt_"+idT+$.trim(ide)).val(nombre);
    $("#txt_"+idT+$.trim(ide)+"_id").val(id);
    if( idT=='colegio' ){
        Visita.ColegioDetalle(ColegioDetalleHTML);
    }
}

ValidarForm=function(){
    var r=true;
    if( $.trim($("#txt_fecha_visita").val())=="" ){
        r=false;
        alert('Seleccione una fecha');
        $("#txt_fecha_visita").focus()
    }
    else if( $.trim($("#txt_tiempo_programado").val())=="" ){
        r=false;
        alert('Ingrese su tiempo programado');
        $("#txt_tiempo_programado").focus()
    }
    else if( $.trim($("#slct_ode").val())=="" ){
        r=false;
        alert('Seleccione Ode');
        $("#slct_ode").focus()
    }
    else if( $.trim($("#slct_distrito").val())=="" ){
        r=false;
        alert('Seleccione Distrito');
        $("#slct_distrito").focus()
    }
    else if( $.trim($("#txt_colegio_id").val())=="" ){
        r=false;
        alert('Busque y Seleccione Colegio');
        $("#txt_colegio_id").focus()
    }
    else if( $("input[name='colegio_detalle[]']:checked").length==0 ){
        r=false;
        alert('Busque y Seleccione Grado y Sección del Colegio');
    }
    else if( $.trim($("#txt_personat_id").val())=="" ){
        r=false;
        alert('Ingrese trabajador Telecita');
        $("#txt_personat").focus()
    }
    else if( $.trim($("#txt_nrot_tel").val())=="" ){
        r=false;
        alert('Ingrese Nro telefónico de Telecita');
        $("#txt_nrot_tel").focus()
    }
    /*else if( $.trim($("#txt_persona_id").val())=="" ){
        r=false;
        alert('Ingrese persona que visitará');
    }
    else if( $.trim($("#txt_personac").val())=="" ){
        r=false;
        alert('Ingrese persona que se contactó');
    }
    else if( $.trim($("#txt_nro_tel").val())=="" ){
        r=false;
        alert('Ingrese Nro telefónico que se contactó');
    }*/
    return r;
}

Guardar=function(){
    if( ValidarForm() ){
        Visita.Crear(Limpiar);
    }
}

Limpiar=function(){
    $("#form_vista input").val('');
    $("#form_vista textarea").val('S/O');
    $("#div_colegio").hide();
    $('#t_colegio_detalle').dataTable().fnDestroy();
    $("#t_colegio_detalle>tbody").html('');
    $("#slct_ode,#slct_distrito").val('');
    $('#slct_ode').multiselect('rebuild');
    $("#slct_ode").change();
    $('.fechaDP').val('<?php echo date("Y-m-d H:i:s");?>');
}
</script>

