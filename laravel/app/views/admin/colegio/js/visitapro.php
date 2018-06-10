<script type="text/javascript">
var IdeGlobal={visita:'',persona:'',seleccion:''};// para crear objeto en arreglo e inicializarlo.
var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;
var cabeceraA=[];
var columnDefsA=[];
var targetsA=-1;
var VisitaDetalleIdG=0;
var AlumnoIdG=0;
var PromotorG=0;
$(document).ready(function() {
    $("#t_promotor").dataTable();
    cabeceraVP=[{
                'id'    :'fecha_visita',
                'idide' :'th_fv',
                'nombre':'Fecha Visita',
                'evento':'onChange',
                },
                {
                'id'    :'distrito',
                'idide' :'th_di',
                'nombre':'Distrito',
                'evento':'onBlur',
                },
                {
                'id'    :'colegio',
                'idide' :'th_co',
                'nombre':'Colegio',
                'evento':'onBlur',
                },
                {
                'id'    :'telefono',
                'idide' :'th_te',
                'nombre':'Teléfono',
                'evento':'onBlur',
                },
                {
                'id'    :'persona_id',
                'idide' :'th_pv',
                'nombre':'Trabajador que Visitará',
                'evento':'onBlur',
                },
                {
                'id'    :'personat_id',
                'idide' :'th_pt',
                'nombre':'Trabajador Telecita',
                'evento':'onBlur',
                }];
    cabeceraA=  [{
                'id'    :'paterno',
                'idide' :'th_pa',
                'nombre':'Paterno',
                'evento':'onBlur',
                },
                {
                'id'    :'materno',
                'idide' :'th_ma',
                'nombre':'Materno',
                'evento':'onBlur',
                },
                {
                'id'    :'nombre',
                'idide' :'th_no',
                'nombre':'Nombre',
                'evento':'onBlur',
                },
                {
                'id'    :'dni',
                'idide' :'th_dni',
                'nombre':'DNI',
                'evento':'onBlur',
                }
                ];

        for(i=0; i<cabeceraVP.length; i++){
            targetsVP++;

            if( cabeceraVP[i].id!='persona_id' ){
                columnDefsVP.push({
                                    "targets": targetsVP,
                                    "data": cabeceraVP[i].id,
                                    "name": cabeceraVP[i].id
                                });
            }
            else{
                columnDefsVP.push({
                                "targets": targetsVP,
                                "data": function ( row, type, val, meta ) {
                                        return  '<span>'+$.trim(row.persona_id)+'</span><input type="hidden" name="txt_pvid" value="'+row.pvid+'">';
                                },
                                "defaultContent": '',
                                "name": "id"
                            });
            }

            $("#t_visita>thead>tr:eq(1)").append('<th style="background-color:#DCE6F1;" class="unread" id="'+cabeceraVP[i].idide+'">'+cabeceraVP[i].nombre+
                                            '<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '+cabeceraVP[i].evento+'="MostrarAjax(\'visita\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
                                            '</th>');
            $("#t_visita>tfoot>tr").append('<th style="background-color:#DCE6F1;" class="unread">'+cabeceraVP[i].nombre+'</th>');
        }
            targetsVP++;
            $("#t_visita>tfoot>tr,#t_visita>thead>tr:eq(1)").append('<th class="unread">[]</th>');
            columnDefsVP.push({
                                "targets": targetsVP,
                                "data": function ( row, type, val, meta ) {
                                        return  '<a class="form-control btn btn-primary" onClick="detalleVisita(this,'+row.id+')">'+
                                                    '<i class="fa fa-lg fa-search"></i>'+
                                                '</a>';
                                },
                                "defaultContent": '',
                                "name": "id"
                            });

        for(i=0; i<cabeceraA.length; i++){
            targetsA++;
            columnDefsA.push({
                                "targets": targetsA,
                                "data": cabeceraA[i].id,
                                "name": cabeceraA[i].id
                            });

            $("#t_alumno_total>thead>tr").append('<th class="unread" id="'+cabeceraA[i].idide+'"><label>'+cabeceraA[i].nombre+'</label>'+
                                            '<input name="txt_'+cabeceraA[i].id+'" id="txt_'+cabeceraA[i].id+'" '+cabeceraA[i].evento+'="MostrarAjax(\'alumno\');" onKeyPress="return enterGlobal(event,\''+cabeceraA[i].idide+'\',1)" type="text" placeholder="'+cabeceraA[i].nombre+'" />'+
                                            '</th>');
            $("#t_alumno_total>tfoot>tr").append('<th class="unread">'+cabeceraA[i].nombre+'</th>');
        }
            targetsA++;
            $("#t_alumno_total>tfoot>tr,#t_alumno_total>thead>tr").append('<th class="unread">[]</th>');
            columnDefsA.push({
                                "targets": targetsA,
                                "data": function ( row, type, val, meta ) {
                                        return  '<a class="form-control btn btn-primary" onClick="AddAlumnos(this,'+row.id+')">'+
                                                    '<i class="fa fa-lg fa-check"></i>'+
                                                '</a>';
                                },
                                "defaultContent": '',
                                "name": "id"
                            });

    $("#txt_fecha_visita,#txt_fecha_nac").daterangepicker(
        {
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            showDropdowns: true
        }
    );

    $("#txt_fecha_visita2").daterangepicker(
        {
            format: 'YYYY-MM-DD HH:mm',
            singleDatePicker: true,
            timePicker: true,
            showDropdowns: true
        }
    );
    MostrarAjax('visita');

    $('#promotorModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // captura al boton
        var trid = button.data('trid'); //extrae el id del atributo data
        var id = button.data('id'); //extrae el id del atributo data
        modal.find('.modal-title').text('Promotor');
        $("#form_promotor input[type='hidden']").remove();
        PromotorG=id;
        data={cargo_id:4};
        VisitaPro.ColegioPersona(ColegioPromotorHTML,data);
    });

    $('#alumnoModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // captura al boton
        var titulo = button.data('titulo'); // extrae del atributo data-
        var trid = button.data('trid'); //extrae el id del atributo data
        modal.find('.modal-title').text(titulo+' Alumno');
        $("#form_alumnos_total input[type='hidden']").remove();
        $("#form_alumnos_total").append("<input type='hidden' id='txt_estado' name='txt_estado' value='1'>");
        $("#form_alumnos_total").append("<input type='hidden' id='cargo_id' name='cargo_id' value='3'>");
        $("#form_alumnos_total").append("<input type='hidden' id='visita_detalle_id' name='visita_detalle_id' value='"+VisitaDetalleIdG+"'>");

        var valores=[]; 
        $("#t_alumno input[name='txt_persona_id[]']").each( 
            function(){ 
                valores.push($(this).val()); 
            } 
        );
        var valor=valores.join(",");

        $("#form_alumnos_total").append("<input type='hidden' id='txt_persona_id_no' name='txt_persona_id_no' value='"+valores+"'>");
        MostrarAjax('alumno');
    });

    $('#alumnoDetalleModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // captura al boton
        var titulo = button.data('titulo'); // extrae del atributo data-
        var trid = button.data('trid'); //extrae el id del atributo data
        modal.find('.modal-title').text('Agregar Detalle Alumno');
        $("#form_alumnos_detalle input[type='hidden']").remove();
        $("#form_alumnos_detalle input,#form_alumnos_detalle select").val('');
        $("#form_alumnos_detalle").append("<input type='hidden' id='alumno_id' name='alumno_id' value='"+AlumnoIdG+"'>");
        modal.find('.modal-footer .btn-primary').text('Guardar');
        modal.find('.modal-footer .btn-primary').attr('onClick','CrearAlumnoDetalle();');

        slctGlobal.listarSlct3('carrera','listartipo','slct_tipo_carrera');
    });

    $('#personaModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        var button = $(event.relatedTarget); // captura al boton
        var titulo = button.data('titulo'); // extrae del atributo data-
        var trid = button.data('trid'); //extrae el id del atributo data
        modal.find('.modal-title').text(titulo+' Alumno');
        $('#form_personas [data-toggle="tooltip"]').css("display","none");
        $("#form_personas input[type='hidden']").remove();
        $("#form_personas").append("<input type='hidden' id='cargos_selec' name='cargos_selec[]' value='3'>");
        $("#form_personas").append("<input type='hidden' id='txt_password' name='txt_password' value='123456'>");
        $("#form_personas").append("<input type='hidden' id='visita_detalle_id' name='visita_detalle_id' value='"+VisitaDetalleIdG+"'>");

        if(titulo=='Nuevo'){
            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','AgregarAlumno();');
            $('#form_personas #slct_estado').val(1); 
            $('#form_personas #txt_nombre').focus();
        }
    });

    $('#personaModal,#alumnoModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });

    Colegios.cargarSelect('Departamento', 'colegio/listardepartamento', '#slct_departamento_id', 'nuevo', null);

    $("#slct_departamento_id").change(function(){
        var id_departamento = $(this).val();
        Colegios.cargarSelectAnidado('Provincia', 'colegio/listarprovincia', '#slct_provincia_id', 'nuevo',null, id_departamento);
        $("#slct_distrito_id").empty();
    });

    $("#slct_provincia_id").change(function(){
        var id_provincia = $(this).val();
        Colegios.cargarSelectAnidado('Distrito', 'colegio/listardistrito', '#slct_distrito_id', 'nuevo',null, id_provincia);
    });
});

CargarCarreras=function(val){
    var data={carrera_tipo_id:val};
    slctGlobal.listarSlct2('carrera','slct_carrera',data);
}

AgregarAlumno=function(){
    if( validarPersona() ){
        VisitaPro.CrearPersona();
    }
}

ActualizarContactoP=function(t){
    var data={
            id:     IdeGlobal.visita,
            campo:  $(t).attr("name").split("txt_").join(""),
            valor:  $(t).val() 
        };
    VisitaPro.ActualizarContactoP(data);
}

ActualizarFecha=function(t){
    var data={
            id:     IdeGlobal.visita,
            campo:  'fecha_visita',
            valor:  $(t).val() 
        };
    VisitaPro.ActualizarContactoP(data);
}

ActualizarAlumnoR=function(t){
    var data={
            id:     $(t).attr("data-id"),
            campo:  $(t).attr("name").split("txt_").join(""),
            valor:  $(t).val() 
        };
    VisitaPro.ActualizarAlumnoR(data);
}

validarPersona=function(){
    var rpta=true;
    if( $.trim( $("#form_personas #txt_nombre").val() )=='' ){
        alert('Ingrese Nombre');
        rpta=false;
    }
    else if( $.trim( $("#form_personas #txt_paterno").val() )=='' ){
        alert('Ingrese Paterno');
        rpta=false;
    }
    return rpta;
}

detalleVisita=function(btn,id){
var tr = btn.parentNode.parentNode;
var trs = tr.parentNode.children;
for(var i =0;i<trs.length;i++)
    trs[i].style.backgroundColor="#f9f9f9";
tr.style.backgroundColor = "#9CD9DE";
    
    IdeGlobal.seleccion=tr;
    $("#txt_persona2_id").val( $(IdeGlobal.seleccion).find("td:eq(4)>input").val() );
    $("#txt_persona2").val( $(IdeGlobal.seleccion).find("td:eq(4)>span").text() );
    $("#txt_fecha_visita2").val( $(IdeGlobal.seleccion).find("td:eq(0)").text() );
    IdeGlobal.visita=id;
    VisitaPro.CargarContactos(CargarContactosHTML,id);
    VisitaPro.CargarDetalle(CargarDetalleHTML,id);
}

CargarContactosHTML=function(obj){
    $("#txt_contacto").val(obj.contacto);
    $("#txt_cargo").val(obj.cargo);
    $("#txt_email").val(obj.email);
    $("#txt_telefono").val(obj.telefono);
    $("#txt_facebook").val(obj.facebook);
    $("#txt_instagram").val(obj.instagram);
}

CargarDetalleHTML=function(datos){
    html="";
    $("#t_visita_detalle").dataTable().fnDestroy();
    $("#t_visita_detalle tbody").html("");
    $.each(datos,function(id,data){
        html+="<tr>";
        html+="<td>"+data.nivel+"</td>";
        html+="<td>"+data.grado+"</td>";
        html+="<td>"+data.seccion+"</td>";
        html+="<td>"+data.turno+"</td>";
        html+="<td>"+data.alumnos_total+"</td>";
        html+="<td><input type='text' data-id='"+data.id+"' onBlur='ActualizarAlumnoR(this);' value='"+data.alumnos_registrados+"' id='txt_alumnos_registrados_"+data.id+"' name='txt_alumnos_registrados' </td>";
        html+="<td> <input class='col-sm-10' type='text' id='txt_persona_"+data.id+"' value='"+$.trim(data.promotor)+"' readonly>'"+
                    "<a class='form-control btn btn-primary' data-toggle='modal' data-target='#promotorModal' data-trid='t_promotor' data-titulo='Buscar' data-id='"+data.id+"' >"+
                            "<i class='fa fa-lg fa-search'></i>"+
                    "</a>"+
                "</td>";
        html+=  "<td>"+
                "<input type='hidden' value='"+data.id+"' name='txt_visita_detalle_id[]'>"+
                    "<a class='form-control btn btn-primary' onClick='CargarAlumnos(this,"+data.id+")'>"+
                        "<i class='fa fa-lg fa-search'></i>"+
                    "</a>"+
                "</td>";
        html+="</tr>";
    });
    $("#t_visita_detalle tbody").html(html);
    $("#t_visita_detalle").dataTable({
            "scrollY": "400px",
            "scrollCollapse": true,
            "scrollX": true,
            "bPaginate": false,
            "bLengthChange": false,
            "bInfo": false,
            "visible": false,
    });
}

CargarAlumnos=function(btn,id){
var tr = btn.parentNode.parentNode;
var trs = tr.parentNode.children;
for(var i =0;i<trs.length;i++)
    trs[i].style.backgroundColor="#f9f9f9";
tr.style.backgroundColor = "#9CD9DE";
    VisitaDetalleIdG=id;
    VisitaPro.CargarAlumnos(CargarAlumnosHTML,id);
}

CargarAlumnosHTML=function(datos){
    html="";
    $("#t_alumno").dataTable().fnDestroy();
    $("#t_alumno tbody").html("");
    $.each(datos,function(id,data){
        html+="<tr>";
        html+="<td>"+data.paterno+"</td>";
        html+="<td>"+data.materno+"</td>";
        html+="<td>"+data.nombre+"</td>";
        html+="<td>"+data.dni+"</td>";
        html+=  "<td>"+
                "<input type='hidden' value='"+data.id+"' name='txt_alumno_id[]'>"+
                "<input type='hidden' value='"+data.persona_id+"' name='txt_persona_id[]'>"+
                    "<a class='form-control btn btn-primary' onClick='CargarAlumnosDetalle(this,"+data.id+")'>"+
                        "<i class='fa fa-lg fa-search'></i>"+
                    "</a>"+
                    "<a class='form-control btn btn-danger' onClick='EliminarAlumno(this,"+data.id+")'>"+
                        "<i class='fa fa-lg fa-minus'></i>"+
                    "</a>"+
                "</td>";
        html+="</tr>";
    });
    $("#t_alumno tbody").html(html);
    $("#t_alumno").dataTable({
            "scrollY": "400px",
            "scrollCollapse": true,
            "scrollX": true,
            "bPaginate": false,
            "bLengthChange": false,
            "bInfo": false,
            "visible": false,
    });
}

CambiarConvenio=function(val,id){
    VisitaPro.CambiarConvenio(val,id);
}

EliminarAlumno=function(btn,id){
    var tr = btn.parentNode.parentNode;
    VisitaPro.EliminarAlumno(tr,id);
}

AddAlumnos=function(btn,id){
var tr = btn.parentNode.parentNode;
VisitaPro.CrearAlumno(tr,id);
}

MostrarAjax=function(t){
    if( t=="visita" ){
        VisitaPro.Cargar(columnDefsVP);
    }
    else if( t=="alumno" ){
        VisitaPro.CargarAlumnosTotal(columnDefsA);
    }
}

Mostrar=function(evento){
    if( evento=='pvi' ){
        IdeGlobal['persona']="2";
        $("#div_persona").show();
        data={cargo_id:4};
        VisitaPro.ColegioPersona(ColegioPersonaHTML,data);
    }
}

ColegioPromotorHTML=function(datos){
    var html='';
    $('#t_promotor').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        html+="<tr>"+
            "<td>"+data.paterno+"</td>"+
            "<td>"+data.materno+"</td>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.dni+"</td>"+
            '<td><a class="btn btn-primary btn-sm" id="persona" data-id="'+data.id+'" data-nombre="'+data.paterno+' '+data.materno+', '+data.nombre+' | DNI:'+data.dni+'" onClick="PintarPromotor(this)">'+
                '<i class="fa fa-check fa-lg"></i> </a></td>';
        html+="</tr>";
    });

    $("#t_promotor>tbody").html(html); 
    $("#t_promotor").dataTable();
}

PintarPromotor=function(t){
    $("#txt_persona_"+PromotorG).val($(t).attr('data-nombre'));
    $('#promotorModal [data-dismiss]').click();
    data={campo:'persona_id',valor:$(t).attr('data-id'),id:PromotorG};
    VisitaPro.ActualizarAlumnoR(data);
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
        $("#txt_persona2,#txt_persona2_id").val('');
    }

    $("#t_persona>tbody").html(html); 
    $("#t_persona").dataTable();
}

SeleccionarTable=function(ts,ide){
    var id=$(ts).attr("data-id");
    var nombre=$(ts).attr("data-nombre");
    var idT=$(ts).attr("id");

    $("#div_"+idT).hide();

    $("#txt_"+idT+$.trim(ide)).val(nombre);
    $("#txt_"+idT+$.trim(ide)+"_id").val(id);
    var data={id:IdeGlobal.visita,persona_id:id}

    $(IdeGlobal.seleccion).find("td:eq(3)>input").val(id);
    $(IdeGlobal.seleccion).find("td:eq(3)>span").text(nombre.split("|")[0]);

    VisitaPro.ActualizarTrabajador(data);
}

CargarAlumnosDetalle=function(btn,id){
var tr = btn.parentNode.parentNode;
var trs = tr.parentNode.children;
for(var i =0;i<trs.length;i++)
    trs[i].style.backgroundColor="#f9f9f9";
tr.style.backgroundColor = "#9CD9DE";
    AlumnoIdG=id;
    VisitaPro.CargarAlumnosDetalle(CargarAlumnosDetalleHTML,id);
}

CargarAlumnosDetalleHTML=function(datos){
    html="";
    $("#t_alumno_detalle").dataTable().fnDestroy();
    $("#t_alumno_detalle tbody").html("");
    $.each(datos,function(id,data){
        html+="<tr>";
        html+="<td>"+data.carrera+"</td>";
        html+="<td>"+data.monto+"</td>";
        html+=  "<td>"+
                    "<a class='form-control btn btn-danger' onClick='EliminarAlumnoDetalle(this,"+data.id+")'>"+
                        "<i class='fa fa-lg fa-minus'></i>"+
                    "</a>"+
                "</td>";
        html+="</tr>";
    });
    $("#t_alumno_detalle tbody").html(html);
    $("#t_alumno_detalle").dataTable({
            "scrollY": "400px",
            "scrollCollapse": true,
            "scrollX": true,
            "bPaginate": false,
            "bLengthChange": false,
            "bInfo": false,
            "visible": false,
    });
}

EliminarAlumnoDetalle=function(btn,id){
    var tr = btn.parentNode.parentNode;
    VisitaPro.EliminarAlumnoDetalle(tr,id);
}

CrearAlumnoDetalle=function(){
    if( ValidarAlumnoDetalle() ){
        VisitaPro.CrearAlumnoDetalle();
    }
}

ValidarAlumnoDetalle=function(){
    var rpta=true;

    if( $.trim( $("#form_alumnos_detalle #slct_tipo_carrera").val() )=='' ){
        alert('Seleccione Tipo Carrera');
        rpta=false;
    }
    else if( $.trim( $("#form_alumnos_detalle #slct_carrera").val() )=='' ){
        alert('Seleccione Carrera');
        rpta=false;
    }
    else if( $.trim( $("#form_alumnos_detalle #txt_monto").val() )=='' ){
        alert('Ingrese Monto ');
        rpta=false;
    }
    return rpta;
}
</script>

