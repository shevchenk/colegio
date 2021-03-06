<script type="text/javascript">
var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;

$(document).ready(function() {
	$(".fecha").datetimepicker({
        format: "yyyy-mm-dd",
        language: 'es',
        showMeridian: true,
        time:true,
        minView:2,
        autoclose: true,
        todayBtn: false
    });

    $('#spn_fecha_actual').on('click', function(){
        $('#txt_fecha_actual').focus();
    });

    $('#txt_fecha_actual').val("<?php  echo date('Y-m-d');?>");

    $(document).on('click', '#btnexport', function(event) {
        var data = DataToFilter();
        if(data.length > 0){
            $(this).attr('href','reporte/indicedata'+'?fecha_actual='+data[0]['fecha_actual']);
        }else{
            event.preventDefault();
        }
    });
	/*cabeceraVP=[
				{
					'id'    :'ode',
					'idide' :'th_ode',
					'nombre':'Ode',
					'evento':'onBlur',
				},
				{
					'id'    :'g1',
					'idide' :'th_g1',
					'nombre':'1ro',
					'evento':'onBlur',
				},
				{
					'id'    :'g2',
					'idide' :'th_g2',
					'nombre':'2do',
					'evento':'onBlur',
				},
				{
					'id'    :'g3',
					'idide' :'th_g3',
					'nombre':'3ro',
					'evento':'onBlur',
				},
				{
					'id'    :'g4',
					'idide' :'th_g4',
					'nombre':'4to',
					'evento':'onBlur',
				},
				{
					'id'    :'g5',
					'idide' :'th_g5',
					'nombre':'5to',
					'evento':'onBlur',
				},
				{
					'id'    :'recopilada',
					'idide' :'th_recopilada',
					'nombre':'Recopilada',
					'evento':'onBlur',
				},
				{
					'id'    :'por_recopilar',
					'idide' :'th_por_recopilar',
					'nombre':'X Recopilar',
					'evento':'onBlur',
				},
				{
					'id'    :'meta',
					'idide' :'th_meta',
					'nombre':'Meta',
					'evento':'onBlur',
				},
				{
					'id'    :'inicio',
					'idide' :'th_inicio',
					'nombre':'Inicio',
					'evento':'onBlur',
				},
				{
					'id'    :'termino',
					'idide' :'th_termino',
					'nombre':'Termino',
					'evento':'onBlur',
				},
				{
					'id'    :'d1',
					'idide' :'th_d1',
					'nombre':'D&iacute;a 1',
					'evento':'onBlur',
				},
				{
					'id'    :'d2',
					'idide' :'th_d2',
					'nombre':'D&iacute;a 2',
					'evento':'onBlur',
				},
				{
					'id'    :'d3',
					'idide' :'th_d3',
					'nombre':'D&iacute;a 3',
					'evento':'onBlur',
				},
				{
					'id'    :'d4',
					'idide' :'th_d4',
					'nombre':'D&iacute;a 4',
					'evento':'onBlur',
				},
				{
					'id'    :'d5',
					'idide' :'th_d5',
					'nombre':'D&iacute;a 5',
					'evento':'onBlur',
				},
				{
					'id'    :'d6',
					'idide' :'th_d6',
					'nombre':'D&iacute;a 6',
					'evento':'onBlur',
				},
				{
					'id'    :'d7',
					'idide' :'th_d7',
					'nombre':'D&iacute;a 7',
					'evento':'onBlur',
				},
				{
					'id'    :'total_cole',
					'idide' :'th_total_cole',
					'nombre':'Total',
					'evento':'onBlur',
				},
				{
					'id'    :'dia_camp',
					'idide' :'th_dia_camp',
					'nombre':'D&iacute;a Camp',
					'evento':'onBlur',
				},
				{
					'id'    :'dia_falta_camp',
					'idide' :'th_dia_falta_camp',
					'nombre':'D&iacute;a Falta',
					'evento':'onBlur',
				},
				{
					'id'    :'total_dia_camp',
					'idide' :'th_total_dia_camp',
					'nombre':'Total D&iacute;a',
					'evento':'onBlur',
				},
				{
					'id'    :'indice_diario',
					'idide' :'th_indice_diario',
					'nombre':'Ind. Diario',
					'evento':'onBlur',
				},
				{
					'id'    :'inicio_proyectado',
					'idide' :'th_inicio_proyectado',
					'nombre':'Ind. Proyectado',
					'evento':'onChange'
				},
				{
					'id'    :'total_fin_camp',
					'idide' :'th_total_fin_camp',
					'nombre':'Total Camp',
					'evento':'onBlur'
				}
				];

		for(i=0; i<cabeceraVP.length; i++)
		{
			targetsVP++;
			columnDefsVP.push({
				"targets": targetsVP,
				"data": cabeceraVP[i].id,
				"name": cabeceraVP[i].id
			});

			$("#t_indicedata>thead>tr:eq(1)").append('<th class="unread" id="'+cabeceraVP[i].idide+'">'
				+cabeceraVP[i].nombre+'<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '
				+cabeceraVP[i].evento+'="MostrarAjax(\'indicedata\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
				'</th>');
				$("#t_indicedata>tfoot>tr").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
		}
		targetsVP++;

	$("#txt_fecha_actual").daterangepicker(
		{
			format: 'YYYY-MM-DD',
			singleDatePicker: true,
			showDropdowns: true
		}
	);
	MostrarAjax('indicedata');

	$("select[name='slct_todo']").change(function(){
		var mFiltro = $(this).val();
		if(mFiltro!="")
		{
			$("#form_filtros").submit();
		}
	});

	$('#txt_fecha_actual').on('hide.daterangepicker', function(ev, picker) {
		MostrarAjax('indicedata');
	});*/

});

function DataToFilter(){
    var fecha_actual = $('#txt_fecha_actual').val();
    var data = [];
    if ( fecha_actual!="") {
        data.push({fecha_actual:fecha_actual});
    } else {
        alert("Seleccione Fechas");
    }
    return data;
}
/*
MostrarAjax=function(t){
	if( t=="indicedata" )
	{
		oIndiceData.Cargar(columnDefsVP);
	}
}*/
</script>
