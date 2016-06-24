<script type="text/javascript">
var IdeGlobal={visita:''};// para crear objeto en arreglo e inicializarlo.
var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;
$(document).ready(function() {
    cabeceraVP=[{
                'id'    :'fecha_visita',
                'idide' :'th_fv',
                'nombre':'Fecha Visita',
                'evento':'onChange',
                },
                {
                'id'    :'ode',
                'idide' :'th_od',
                'nombre':'Ode',
                'evento':'onBlur',
                },
                {
                'id'    :'colegio',
                'idide' :'th_co',
                'nombre':'Colegio',
                'evento':'onBlur',
                },
                {
                'id'    :'persona_id',
                'idide' :'th_pv',
                'nombre':'Persona que Visitará',
                'evento':'onBlur',
                },
                {
                'id'    :'personac_id',
                'idide' :'th_pc',
                'nombre':'Persona que Contactó',
                'evento':'onBlur',
                },
                {
                'id'    :'nro_tel',
                'idide' :'th_nt',
                'nombre':'Nro que Contactó',
                'evento':'onBlur'
                }];

        for(i=0; i<cabeceraVP.length; i++){
            targetsVP++;
            columnDefsVP.push({
                                "targets": targetsVP,
                                "data": cabeceraVP[i].id,
                                "name": cabeceraVP[i].id
                            });

            $("#t_visita>thead>tr").append('<th class="unread" id="'+cabeceraVP[i].idide+'">'+cabeceraVP[i].nombre+
                                            '<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '+cabeceraVP[i].evento+'="MostrarAjax(\'visita\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
                                            '</th>');
            $("#t_visita>tfoot>tr").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
        }
            targetsVP++;
            $("#t_visita>tfoot>tr,#t_visita>thead>tr").append('<th class="unread">[]</th>');
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

    $("#txt_fecha_visita").daterangepicker(
        {
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            showDropdowns: true
        }
    );
    MostrarAjax('visita');
});

detalleVisita=function(btn,id){
var tr = btn.parentNode.parentNode;
var trs = tr.parentNode.children;
for(var i =0;i<trs.length;i++)
    trs[i].style.backgroundColor="#f9f9f9";
tr.style.backgroundColor = "#9CD9DE";
    VisitaPro.CargarDetalle(CargarDetalleHTML);
}

CargarDetalleHTML=function(datos){

}

MostrarAjax=function(t){
    if( t=="visita" ){
        VisitaPro.Cargar(columnDefsVP);
    }
}

Mostrar=function(evento){
    if( evento=='col' ){

    }
}

/*ActualizaTa=function(t){
    if( $(t).is(":checked") ){
        $(t).closest("tr").find("td>input[type='text']").removeAttr("disabled");
    }
    else{
        $(t).closest("tr").find("td>input[type='text']").attr("disabled","true");
    }
}*/

/*SeleccionarTable=function(ts,ide){
    var id=$(ts).attr("data-id");
    var nombre=$(ts).attr("data-nombre");
    var idT=$(ts).attr("id");

    $("#div_"+idT).hide();

    $("#txt_"+idT+$.trim(ide)).val(nombre);
    $("#txt_"+idT+$.trim(ide)+"_id").val(id);

}*/

ValidarForm=function(){
    var r=true;
    return r;
}

Guardar=function(){
    if( ValidarForm() ){
        
    }
}

Limpiar=function(){
    
}
</script>

