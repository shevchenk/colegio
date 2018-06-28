<script type="text/javascript">
/*var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;*/

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

    $('#spn_fecha_ini').on('click', function(){
        $('#txt_fecha_inicio').focus();
    });
    $('#spn_fecha_fin').on('click', function(){
        $('#txt_fecha_final').focus();
    });

    $(document).on('click', '#btnexport', function(event) {
        var data = DataToFilter();
        if(data.length > 0){
            $(this).attr('href','reporte/datacole'+'?fecha_inicio='+data[0]['fecha_inicio']+'&fecha_final='+data[0]['fecha_final']);
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
					'id'    :'tipo_colegio',
					'idide' :'th_tipo_colegio',
					'nombre':'Tipo Colegio',
					'evento':'onBlur',
				},
				{
					'id'    :'colegio',
					'idide' :'th_colegio',
					'nombre':'Colegio',
					'evento':'onBlur',
				},
				{
					'id'    :'nivel_cole',
					'idide' :'th_nivel_cole',
					'nombre':'Nivel',
					'evento':'onBlur',
				},
				{
					'id'    :'genero',
					'idide' :'th_genero',
					'nombre':'Género',
					'evento':'onBlur',
				},
				{
					'id'    :'turno',
					'idide' :'th_turno',
					'nombre':'Turno',
					'evento':'onBlur',
				},
				{
					'id'    :'director',
					'idide' :'th_director',
					'nombre':'Director',
					'evento':'onBlur',
				},
				{
					'id'    :'telefono',
					'idide' :'th_telefono',
					'nombre':'Telefono',
					'evento':'onBlur',
				},
				{
					'id'    :'email',
					'idide' :'th_email',
					'nombre':'Correo',
					'evento':'onBlur',
				},
				{
					'id'    :'direccion',
					'idide' :'th_direccion',
					'nombre':'Direcci&oacute;n',
					'evento':'onBlur',
				},
				{
					'id'    :'localidad',
					'idide' :'th_localidad',
					'nombre':'Localidad',
					'evento':'onBlur',
				},
				{
					'id'    :'referencia',
					'idide' :'th_referencia',
					'nombre':'Referencia',
					'evento':'onBlur',
				},
				{
					'id'    :'distrito',
					'idide' :'th_distrito',
					'nombre':'Distrito',
					'evento':'onBlur',
				},
				{
					'id'    :'provincia',
					'idide' :'th_provincia',
					'nombre':'Provincia',
					'evento':'onBlur',
				},
				{
					'id'    :'departamento',
					'idide' :'th_departamento',
					'nombre':'Departamento',
					'evento':'onBlur',
				},
				{
					'id'    :'ugel',
					'idide' :'th_ugel',
					'nombre':'Ugel',
					'evento':'onBlur',
				},
				{
					'id'    :'contesta',
					'idide' :'th_contesta',
					'nombre':'Contesta',
					'evento':'onBlur',
				},
				{
					'id'    :'recibe',
					'idide' :'th_recibe',
					'nombre':'Recibe',
					'evento':'onBlur',
				},
				{
					'id'    :'tele_nombre',
					'idide' :'th_tele_nombre',
					'nombre':'Nombre',
					'evento':'onBlur',
				},
				{
					'id'    :'tele_fecha',
					'idide' :'th_tele_fecha',
					'nombre':'Fecha',
					'evento':'onBlur',
				},
				{
					'id'    :'fecha_visita',
					'idide' :'th_fecha_visita',
					'nombre':'Fecha Visita',
					'evento':'onChange'
				},
				{
					'id'    :'hora',
					'idide' :'th_hora',
					'nombre':'Hora',
					'evento':'onBlur'
				},
				{
					'id'    :'tiempo',
					'idide' :'th_tiempo',
					'nombre':'Tiempo',
					'evento':'onBlur'
				},
				{
					'id'    :'sec_1',
					'idide' :'th_sec_1',
					'nombre':'Sec. 1',
					'evento':'onBlur'
				},
				{
					'id'    :'sec_2',
					'idide' :'th_sec_2',
					'nombre':'Sec. 2',
					'evento':'onBlur'
				},
				{
					'id'    :'sec_3',
					'idide' :'th_sec_3',
					'nombre':'Sec. 3',
					'evento':'onBlur'
				},
				{
					'id'    :'sec_4',
					'idide' :'th_sec_4',
					'nombre':'Sec. 4',
					'evento':'onBlur'
				},
				{
					'id'    :'sec_5',
					'idide' :'th_sec_5',
					'nombre':'Sec. 5',
					'evento':'onBlur'
				},
				{
					'id'    :'total_sec',
					'idide' :'th_total_sec',
					'nombre':'Sec. Total',
					'evento':'onBlur'
				},
				{
					'id'    :'dat_1',
					'idide' :'th_dat_1',
					'nombre':'Data 1',
					'evento':'onBlur'
				},
				{
					'id'    :'dat_2',
					'idide' :'th_dat_2',
					'nombre':'Data 2',
					'evento':'onBlur'
				},
				{
					'id'    :'dat_3',
					'idide' :'th_dat_3',
					'nombre':'Data 3',
					'evento':'onBlur'
				},
				{
					'id'    :'dat_4',
					'idide' :'th_dat_4',
					'nombre':'Data 4',
					'evento':'onBlur'
				},
				{
					'id'    :'dat_5',
					'idide' :'th_dat_5',
					'nombre':'Data 5',
					'evento':'onBlur'
				},
				{
					'id'    :'total_dat',
					'idide' :'th_total_dat',
					'nombre':'Data Total',
					'evento':'onBlur'
				},
				{
					'id'    :'observacion',
					'idide' :'th_observacion',
					'nombre':'Observacion',
					'evento':'onBlur'
				},
				{
					'id'    :'promotor',
					'idide' :'th_promotor',
					'nombre':'Promotor',
					'evento':'onBlur'
				},
				{
					'id'    :'contacto',
					'idide' :'th_contacto',
					'nombre':'Nombre',
					'evento':'onBlur'
				},
				{
					'id'    :'cargo',
					'idide' :'th_cargo',
					'nombre':'Cargo',
					'evento':'onBlur'
				},
				{
					'id'    :'c_email',
					'idide' :'th_c_email',
					'nombre':'Correo',
					'evento':'onBlur'
				},
				{
					'id'    :'c_telefono',
					'idide' :'th_c_telefono',
					'nombre':'Telefono',
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

			$("#t_data>thead>tr:eq(1)").append('<th class="unread" id="'+cabeceraVP[i].idide+'">'
				+cabeceraVP[i].nombre+'<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '
				+cabeceraVP[i].evento+'="MostrarAjax(\'data\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
				'</th>');
				$("#t_data>tfoot>tr").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
		}
		targetsVP++;

	$("#txt_fecha_visita, #txt_tele_fecha").daterangepicker(
		{
			format: 'YYYY-MM-DD',
			singleDatePicker: true,
			showDropdowns: true
		}
	);
	MostrarAjax('data');

	$("select[name='slct_todo']").change(function(){
		var mFiltro = $(this).val();
		if(mFiltro!="")
		{
			$("#form_filtros").submit();
		}
	});*/

});
function DataToFilter(){
    var fecha_inicio = $('#txt_fecha_inicio').val();
    var fecha_final = $('#txt_fecha_final').val();
    var data = [];
    if ( fecha_inicio!="" && fecha_final!="") {
        data.push({fecha_inicio:fecha_inicio,fecha_final:fecha_final});
       
    } else {
        alert("Seleccione Fechas");
    }
    return data;
}
/*
MostrarAjax=function(t){
	if( t=="data" )
	{
		oData.Cargar(columnDefsVP);
	}
}*/
</script>
