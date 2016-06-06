<script type="text/javascript">
$(document).ready(function() {

	Colegios.CargarOpciones(activarTabla);

	$('#colegioModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var titulo = button.data('titulo');
		var modal = $(this);

		modal.find('.modal-title').text(titulo+' Colegio');
		$('#form_colegios [data-toggle="tooltip"]').css("display","none");
		$("#form_colegios input[type='hidden']").remove();
		
		if(titulo=='Nuevo') {
			Colegios.cargarSelect('Ode', 'colegio/listarode', '#slct_ode_id', 'nuevo', null);
			Colegios.cargarSelect('Tipo', 'colegio/listartipo', '#slct_colegio_tipo_id', 'nuevo', null);
			Colegios.cargarSelect('Nivel', 'colegio/listarnivel', '#slct_colegio_nivel_id', 'nuevo', null);
			Colegios.cargarSelect('Departamento', 'colegio/listardepartamento', '#slct_departamento_id', 'nuevo', null);
			Colegios.cargarSelect('Persona', 'colegio/listarpersona', '#slct_persona_id', 'nuevo', null);
			modal.find('.modal-footer .btn-primary').text('Guardar');
			modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
			$('#form_colegios #txt_nombre').focus();
		}
		else {
			modal.find('.modal-footer .btn-primary').text('Actualizar');
			modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');

			ode_id=$('#tb_colegios #ode_'+button.data('id')).attr('ode_id');
			Colegios.cargarSelect('Ode', 'colegio/listarode', '#slct_ode_id', 'editar', ode_id);
			$('#form_colegios #txt_nombre').val( $('#tb_colegios #nombre_'+button.data('id')).text());
			tipo_id=$('#tb_colegios #tipo_'+button.data('id')).attr('tipo_id');
			Colegios.cargarSelect('Tipo', 'colegio/listartipo', '#slct_colegio_tipo_id', 'editar', tipo_id);
			nivel_id=$('#tb_colegios #nivel_'+button.data('id')).attr('nivel_id');
			Colegios.cargarSelect('Nivel', 'colegio/listarnivel', '#slct_colegio_nivel_id', 'editar', nivel_id);
			departamento_id=$('#tb_colegios #departamento_'+button.data('id')).attr('departamento_id');
			Colegios.cargarSelect('Departamento', 'colegio/listardepartamento', '#slct_departamento_id', 'editar', departamento_id);
			provincia_id=$('#tb_colegios #provincia_'+button.data('id')).attr('provincia_id');
			Colegios.cargarSelectAnidado('Provincia', 'colegio/listarprovincia', '#slct_provincia_id', 'editar', provincia_id, departamento_id);
			distrito_id=$('#tb_colegios #distrito_'+button.data('id')).attr('distrito_id');
			Colegios.cargarSelectAnidado('Distrito', 'colegio/listardistrito', '#slct_distrito_id', 'editar', distrito_id, provincia_id);
			$('#form_colegios #txt_direccion').val( $('#tb_colegios #direccion_'+button.data('id')).text());
			$('#form_colegios #txt_referencia').val( $('#tb_colegios #referencia_'+button.data('id')).text());
			persona_id=$('#tb_colegios #persona_'+button.data('id')).attr('persona_id');
			Colegios.cargarSelect('Persona', 'colegio/listarpersona', '#slct_persona_id', 'editar', persona_id);
			$('#form_colegios #txt_telefono').val( $('#tb_colegios #telefono_'+button.data('id')).text());
			$('#form_colegios #txt_celular').val( $('#tb_colegios #celular_'+button.data('id')).text());

			$('#form_colegios #slct_estado').val( $('#tb_colegios #estado_'+button.data('id') ).attr("data-estado") );
			$("#form_colegios").append("<input type='hidden' value='"+button.data('id')+"' name='id'>");
		}

	});

	$('#colegioModal').on('hide.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body input').val('');
	});

	$("#slct_departamento_id").change(function(){
		var id_departamento = $(this).val();
		Colegios.cargarSelectAnidado('Provincia', 'colegio/listarprovincia', '#slct_provincia_id', 'nuevo',null, id_departamento);
		$("#slct_distrito_id").empty();
	});

	$("#slct_provincia_id").change(function(){
		var id_provincia = $(this).val();
		Colegios.cargarSelectAnidado('Distrito', 'colegio/listardistrito', '#slct_distrito_id', 'nuevo',null, id_provincia);
	});

	$('#detalleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var titulo = button.data('titulo');
		var modal = $(this);

		modal.find('.modal-title').text("Colegio: "+titulo);
		$('#form_detalle [data-toggle="tooltip"]').css("display","none");
		$("#form_detalle input[type='hidden']").remove();
		$("#txt_colegio_id").val(id);
		$("table.tblDetalle tbody .filaAgregada").remove();
	});

	$("#detalleModal .btnAgregar").on("click", function() {
		$('.tblDetalle tbody').append(agregarDetalle);
	});

	$("#detalleModal").on("click", ".btnQuitar", function() {
		var id_row = $(this).attr("id_row");
		$("table.tblDetalle tbody .row_"+id_row).remove();
	});

});

activarTabla=function(){
	$("#t_colegios").dataTable();
};

Agregar=function(){
	Colegios.AgregarEditarOpciones(0);
};

Editar=function(){
	Colegios.AgregarEditarOpciones(1);
};

activar=function(id){
	Colegios.CambiarEstadoOpciones(id,1);
};

desactivar=function(id){
	Colegios.CambiarEstadoOpciones(id,0);
};

agregarDetalle = function(){
	var oDate = new Date();
	var nTime = oDate.getSeconds() + "" + oDate.getTime();
	var sGrado = "<select name='slct_grado[]' class='form-control input-sm'>"+
					"<option value='1'>1</option>"+
					"<option value='2'>2</option>"+
					"<option value='3'>3</option>"+
					"<option value='4'>4</option>"+
					"<option value='5'>5</option>"+
					"<option value='6'>6</option>"+
				"</select>";
	var sNivel = "<select name='slct_nivel[]' class='form-control input-sm'>"+
					"<option value='1'>Inicial</option>"+
					"<option value='2'>Primaria</option>"+
					"<option value='3'>Secundaria</option>"+
				"</select>";
	var sTurno = "<select name='slct_turno[]' class='form-control input-sm'>"+
					"<option value='1'>Ma&ntilde;ana</option>"+
					"<option value='2'>Tarde</option>"+
					"<option value='3'>Noche</option>"+
				"</select>";
	var sHtml = "<tr class='row_"+nTime+" filaAgregada'>"+
					"<td>"+sGrado+"</td>"+
					"<td><input type='text' name='txt_seccion[]' class='form-control input-sm' /></td>"+
					"<td>"+sNivel+"</td>"+
					"<td>"+sTurno+"</td>"+
					"<td><input type='hidden' name='txt_accion[]' class='form-control input-sm' value='I' /></td>"+
					"<td><a class='btn btn-danger btn-xs btnQuitar' id_row='"+nTime+"'><i class='fa fa-times fa-1x'></i></a></td>"+
				"</tr>";
	return sHtml;
}

editarDetalle = function(){
	Colegios.AgregarEditarDetalle();
}
</script>
