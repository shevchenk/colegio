<script type="text/javascript">
$(document).ready(function() {

	Odes.CargarOpciones(activarTabla);

	$('#odeModal').on('show.bs.modal', function (event) {
		departamentoLocalStore();
		var button = $(event.relatedTarget);
		var titulo = button.data('titulo');
		var modal = $(this);
		modal.find('.modal-title').text(titulo+' Ode');
		$('#form_odes [data-toggle="tooltip"]').css("display","none");
		$("#form_odes input[type='hidden']").remove();
		if(titulo=='Nuevo') {
			Odes.cargarSelectAnidado('Departamento', 'colegio/listardepartamento', '#slct_departamento_id', 'nuevo', null, null);
			modal.find('.modal-footer .btn-primary').text('Guardar');
			modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
			$('#form_odes #txt_nombre').focus();
		}
		else {
			//~ tipo_id=$('#tb_carreras #tipo_id_'+button.data('id') ).attr('tipo_id');
			//~ Carreras.cargarTipos('editar',tipo_id);
			//~ modal.find('.modal-footer .btn-primary').text('Actualizar');
			//~ modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
			//~ $('#form_carreras #txt_carrera').val( $('#tb_carreras #nombre_'+button.data('id') ).text() );
			//~ $('#form_carreras #slct_tipo_id').val( $('#tb_carreras #tipo_id_'+button.data('id') ).text() );
			//~ $('#form_carreras #slct_estado').val( $('#tb_carreras #estado_'+button.data('id') ).attr("data-estado") );
			//~ $("#form_carreras").append("<input type='hidden' value='"+button.data('id')+"' name='id'>");
		}
		$("table.tblDetalle tbody .filaAgregada").remove();
	});

	$('#odeModal').on('hide.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body input').val('');
	});

	$("#slct_departamento_id").change(function(){
		var id_departamento = $(this).val();
		Odes.cargarSelectAnidado('Provincia', 'colegio/listarprovincia', '#slct_provincia_id', 'nuevo',null, id_departamento);
		$("#slct_distrito_id").empty();
	});

	$("#slct_provincia_id").change(function(){
		var id_provincia = $(this).val();
		Odes.cargarSelectAnidado('Distrito', 'colegio/listardistrito', '#slct_distrito_id', 'nuevo',null, id_provincia);
	});

	$("#odeModal .btnAgregarDistrito").on("click", function() {
		$('.tblDetalle tbody').append(agregarDetalle);
	});

	$("#odeModal .tblDetalle").on("change", ".sltDepartamento", function(){
		var id_departamento = $(this).val();
		var id = $(this).attr('id');
		$("#pro_"+id).empty();
		Odes.cargarSelectAnidado('Provincia', 'colegio/listarprovincia', '#pro_'+id, 'nuevo',null, id_departamento);
		$("#dis_"+id).empty();
	});

	$("#odeModal .tblDetalle").on("change", ".sltProvincia", function(){
		var id_provincia = $(this).val();
		var id = $(this).attr('id_padre');
		$("#dis_"+id).empty();
		Odes.cargarSelectAnidado('Distrito', 'ode/listardistrito', '#dis_'+id, 'nuevo',null, id_provincia);
	});

	$("#odeModal .tblDetalle").on("change", ".sltDistrito", function(){
		var id_distrito = $(this).val();
		var id = $(this).attr('id_padre');
		var sId = "dis_"+id;
		var oDistrito = $("select[name='slct_distrito_id[]']");
		var nError = 0;
		$.each(oDistrito, function( nIdx, mVal ) {
			if(sId!=mVal.id && mVal.value==id_distrito)
			{
				nError = nError + 1;
			}
		});
		if(nError>=1)
		{
			$("#"+sId).val(0);
			msjG.mensaje("danger","Distrito ya fue seleccionado",5000);
			return false;
		}
	});

	$("#odeModal .tblDetalle").on("click", ".btnQuitar", function() {
		var id_row = $(this).attr("id_row");
		$("table.tblDetalle tbody .row_"+id_row).remove();
	});

});

activarTabla=function(){
	$("#t_odes").dataTable();
};

Agregar=function(){
	Carreras.AgregarEditarOpciones(0);
};

Editar=function(){
	Carreras.AgregarEditarOpciones(1);
};

activar=function(id){
	Carreras.CambiarEstadoOpciones(id,1);
};

desactivar=function(id){
	Carreras.CambiarEstadoOpciones(id,0);
};

agregarDetalle = function()
{
	var oDate = new Date();
	var nTime = oDate.getSeconds() + "" + oDate.getTime();
	var mDepartamento = JSON.parse(localStorage.getItem("oDepartamento"));
	var oDepartamento = JSON.parse(mDepartamento);
	var sDepartamento = "<select name='slct_departamento_id[]' class='form-control input-sm sltDepartamento' id='"+nTime+"'>";
	$.each(oDepartamento, function( nIndx, sVal ) {
		sDepartamento += "<option value='"+nIndx+"'>"+sVal+"</option>";
	});
	sDepartamento += "</select>";
	var sHtml = "<tr class='row_"+nTime+" filaAgregada'>"+
					"<td>"+sDepartamento+"</td>"+
					"<td><select class='form-control input-sm sltProvincia' name='slct_provincia_id[]' id='pro_"+nTime+"' id_padre='"+nTime+"'></select></td>"+
					"<td><select class='form-control input-sm sltDistrito' name='slct_distrito_id[]' id='dis_"+nTime+"' id_padre='"+nTime+"'></select></td>"+
					"<td><input type='hidden' name='txt_accion[]' class='form-control input-sm' value='I' />"+
					"<input type='hidden' name='txt_id[]' class='form-control input-sm' />"+
					"<a class='btn btn-danger btn-xs btnQuitar' id_row='"+nTime+"'><i class='fa fa-times fa-1x'></i></a></td>"+
				"</tr>";
	return sHtml;
}

departamentoLocalStore = function()
{
	$.post('colegio/listardepartamento', { 'parametro': null }, function(oData) {
		var sDepartamento = "{";
		$.each(oData.aData, function( nIdx, mVal ) {
			sDepartamento += '"' + mVal.id + '":"' + mVal.nombre + '",';
		});
		sDepartamento += '"0":"Seleccionar"}';
		localStorage.setItem("oDepartamento", JSON.stringify(sDepartamento));
	}, "json");
}
</script>
