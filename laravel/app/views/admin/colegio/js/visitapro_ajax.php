<script type="text/javascript">
var VisitaPro={
    CargarContactos:function(evento,id){
        $.ajax({
            url         : 'visita/cargarcontactos',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {visita_id:id},
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    evento(obj.data);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    ActualizarAlumnoR:function(datos){
        $.ajax({
            url         : 'visita/actualizaralumnor',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    ActualizarContactoP:function(datos){
        $.ajax({
            url         : 'visita/actualizarcontactop',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    ActualizarTrabajador:function(datos){
        $.ajax({
            url         : 'visita/actualizartrabajador',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    ColegioPersona:function(evento,datos){
        $.ajax({
            url         : 'persona/cargarp',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento(obj.data);
                if( obj.data.length==0 ){
                    msjG.mensaje("danger","No hay personas registradas",5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    Cargar:function(columnDefs){
        $('#t_visita').dataTable().fnDestroy();
        $('#t_visita')
            .on( 'page.dt',   function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .on( 'search.dt', function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .on( 'order.dt',  function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .DataTable( {
                "processing": true,
                "serverSide": true,
                "stateSave": true,
                "searching": false,
                "ordering": false,
                "stateLoadCallback": function (settings) {
                    $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
                },
                "stateSaveCallback": function (settings) { // Cuando finaliza el ajax
                    $(".overlay,.loading-img").remove();
                },
                "ajax": {
                        "url": "visita/cargar",
                        "type": "POST",
                        //"async": false,
                            "data": function(d){
                                datos=$("#form_filtros").serialize().split("txt_").join("").split("slct_").join("").split("%5B%5D").join("[]").split("+").join(" ").split("%7C").join("|").split("%2C").join(",").split("&");
                                
                                for (var i = datos.length - 1; i >= 0; i--) {
                                    if( datos[i].split("[]").length>1 ){
                                        d[ datos[i].split("[]").join("["+contador+"]").split("=")[0] ] = datos[i].split("=")[1];
                                        contador++;
                                    }
                                    else{
                                        d[ datos[i].split("=")[0] ] = datos[i].split("=")[1];
                                    }
                                };
                            },
                        },
                columnDefs
            } );
    },
    CargarAlumnosTotal:function(columnDefs){
        $('#t_alumno_total').dataTable().fnDestroy();
        $('#t_alumno_total')
            .on( 'page.dt',   function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .on( 'search.dt', function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .on( 'order.dt',  function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
            .DataTable( {
                "processing": true,
                "serverSide": true,
                "stateSave": true,
                "searching": false,
                "ordering": false,
                "stateLoadCallback": function (settings) {
                    $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
                },
                "stateSaveCallback": function (settings) { // Cuando finaliza el ajax
                    $(".overlay,.loading-img").remove();
                },
                "ajax": {
                        "url": "persona/cargarp",
                        "type": "POST",
                        //"async": false,
                            "data": function(d){
                                datos=$("#form_alumnos_total").serialize().split("txt_").join("").split("slct_").join("").split("%5B%5D").join("[]").split("+").join(" ").split("%7C").join("|").split("%2C").join(",").split("&");
                                
                                for (var i = datos.length - 1; i >= 0; i--) {
                                    if( datos[i].split("[]").length>1 ){
                                        d[ datos[i].split("[]").join("["+contador+"]").split("=")[0] ] = datos[i].split("=")[1];
                                        contador++;
                                    }
                                    else{
                                        d[ datos[i].split("=")[0] ] = datos[i].split("=")[1];
                                    }
                                };
                            },
                        },
                columnDefs
            } );
    },
    CargarDetalle:function(evento,id){
        $.ajax({
            url         : 'visita/cargardetalle',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {visita_id:id},
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    evento(obj.data);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CargarAlumnos:function(evento,id){
        $.ajax({
            url         : 'visita/cargaralumno',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {visita_detalle_id:id},
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    evento(obj.data);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CargarAlumnosDetalle:function(evento,id){
        $.ajax({
            url         : 'visita/cargaralumnodetalle',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {alumno_id:id},
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    evento(obj.data);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CrearPersona:function(){
        var datos=$("#form_personas").serialize().split("txt_").join("").split("slct_").join("");
        var accion="persona/crear";

        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $("#t_alumno").dataTable().fnDestroy();
                var html="";
                    html+="<tr>";
                    html+="<td>"+$.trim(obj.datos.paterno)+"</td>";
                    html+="<td>"+$.trim(obj.datos.materno)+"</td>";
                    html+="<td>"+$.trim(obj.datos.nombre)+"</td>";
                    html+="<td>"+$.trim(obj.datos.dni)+"</td>";
                    html+=  "<td>"+
                                "<input type='hidden' value='"+obj.datos.id+"' name='txt_alumno_id[]'>"+
                                "<input type='hidden' value='"+obj.datos.persona_id+"' name='txt_persona_id[]'>"+
                                "<a class='form-control btn btn-primary' onClick='CargarAlumnosDetalle(this,"+obj.datos.id+")'>"+
                                    "<i class='fa fa-lg fa-search'></i>"+
                                "</a>"+
                                "<a class='form-control btn btn-danger' onClick='EliminarAlumno(this,"+obj.datos.id+")'>"+
                                    "<i class='fa fa-lg fa-minus'></i>"+
                                "</a>"+
                            "</td>";
                    html+="</tr>";
                    $("#t_alumno tbody").append(html);
                    $("#t_alumno").dataTable({
                            "scrollY": "400px",
                            "scrollCollapse": true,
                            "scrollX": true,
                            "bPaginate": false,
                            "bLengthChange": false,
                            "bInfo": false,
                            "visible": false,
                    });
                    msjG.mensaje("success",obj.msj,5000);
                    $('#personaModal .modal-footer [data-dismiss="modal"]').click();
                }
                else{ 
                    $.each(obj.msj,function(index,datos){
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');
                    });
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CrearAlumno:function(tr,idpersona){
        var accion="alumno/crear";
        var datos={persona_id:idpersona,visita_detalle_id:VisitaDetalleIdG}
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $("#t_alumno").dataTable().fnDestroy();
                    var html="";
                        html+="<tr>";
                        html+="<td>"+$.trim( $(tr).find("td:eq(0)").html() )+"</td>";
                        html+="<td>"+$.trim( $(tr).find("td:eq(1)").html() )+"</td>";
                        html+="<td>"+$.trim( $(tr).find("td:eq(2)").html() )+"</td>";
                        html+="<td>"+$.trim( $(tr).find("td:eq(3)").html() )+"</td>";
                        html+=  "<td>"+
                                    "<input type='hidden' value='"+obj.id+"' name='txt_alumno_id[]'>"+
                                    "<input type='hidden' value='"+idpersona+"' name='txt_persona_id[]'>"+
                                    "<a class='form-control btn btn-primary' onClick='CargarAlumnosDetalle(this,"+obj.id+")'>"+
                                        "<i class='fa fa-lg fa-search'></i>"+
                                    "</a>"+
                                    "<a class='form-control btn btn-danger' onClick='EliminarAlumno(this,"+obj.id+")'>"+
                                        "<i class='fa fa-lg fa-minus'></i>"+
                                    "</a>"+
                                "</td>";
                        html+="</tr>";
                        $("#t_alumno tbody").append(html);
                        $("#t_alumno").dataTable({
                                "scrollY": "400px",
                                "scrollCollapse": true,
                                "scrollX": true,
                                "bPaginate": false,
                                "bLengthChange": false,
                                "bInfo": false,
                                "visible": false,
                        });
                    msjG.mensaje("success",obj.msj,5000);
                    $('#alumnoModal .modal-footer [data-dismiss="modal"]:eq(0)').click();
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    EliminarAlumno:function(tr,id){
        var accion="alumno/eliminar";
        var datos={alumno_id:id};
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $("#t_alumno").dataTable().fnDestroy();
                        $(tr).remove();
                        $("#t_alumno").dataTable({
                                "scrollY": "400px",
                                "scrollCollapse": true,
                                "scrollX": true,
                                "bPaginate": false,
                                "bLengthChange": false,
                                "bInfo": false,
                                "visible": false,
                        });
                    msjG.mensaje("success",obj.msj,5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    EliminarAlumnoDetalle:function(tr,id){
        var accion="alumno/eliminardetalle";
        var datos={alumno_detalle_id:id};
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $("#t_alumno_detalle").dataTable().fnDestroy();
                        $(tr).remove();
                        $("#t_alumno_detalle").dataTable({
                                "scrollY": "400px",
                                "scrollCollapse": true,
                                "scrollX": true,
                                "bPaginate": false,
                                "bLengthChange": false,
                                "bInfo": false,
                                "visible": false,
                        });
                    msjG.mensaje("success",obj.msj,5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CambiarConvenio:function(val,id){
        var accion="alumno/convenio";
        var datos={alumno_id:id,convenio:val};
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    msjG.mensaje("success",obj.msj,1000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CrearAlumnoDetalle:function(){
        var accion="alumno/creardetalle";
        var datos=$("#form_alumnos_detalle").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $("#t_alumno_detalle").dataTable().fnDestroy();
                    var html="";
                        html+="<tr>";
                        html+="<td>"+$("#form_alumnos_detalle #slct_carrera>option:selected").text()+"</td>";
                        html+="<td>"+$("#form_alumnos_detalle #txt_monto").val()+"</td>";
                        html+=  "<td>"+
                                    "<a class='form-control btn btn-danger' onClick='EliminarAlumnoDetalle(this,"+obj.id+")'>"+
                                        "<i class='fa fa-lg fa-minus'></i>"+
                                    "</a>"+
                                "</td>";
                        html+="</tr>";
                        $("#t_alumno_detalle tbody").append(html);
                        $("#t_alumno_detalle").dataTable({
                                "scrollY": "400px",
                                "scrollCollapse": true,
                                "scrollX": true,
                                "bPaginate": false,
                                "bLengthChange": false,
                                "bInfo": false,
                                "visible": false,
                        });
                    msjG.mensaje("success",obj.msj,5000);
                    $('#alumnoDetalleModal .modal-footer [data-dismiss="modal"]:eq(0)').click();
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
};
</script>
