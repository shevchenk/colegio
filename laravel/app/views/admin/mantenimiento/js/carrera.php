<script type="text/javascript">
$(document).ready(function() {

	Carreras.CargarOpciones(activarTabla);

	$('#carreraModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // captura al boton
		var titulo = button.data('titulo'); // extrae del atributo data-
		var modal = $(this); //captura el modal

		modal.find('.modal-title').text(titulo+' Carrera');
		$('#form_carreras [data-toggle="tooltip"]').css("display","none");
		$("#form_carreras input[type='hidden']").remove();
		
		if(titulo=='Nuevo') {
			Carreras.cargarTipos('nuevo',null);
			modal.find('.modal-footer .btn-primary').text('Guardar');
			modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
			//~ $('#form_carreras #slct_estado').val(1);
			$('#form_carreras #txt_carrera').focus();
		}
		else {
			//~ tipo_id=$('#t_carreras #tipo_id_'+button.data('id') ).attr('tipo_id');
			tipo_id=$('#tb_carreras #tipo_id_'+button.data('id') ).attr('tipo_id');
			Carreras.cargarTipos('editar',tipo_id);
			modal.find('.modal-footer .btn-primary').text('Actualizar');
			modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
			//~ $('#form_carreras #txt_carrera').val( $('#t_carreras #nombre_'+button.data('id') ).text() );
			$('#form_carreras #txt_carrera').val( $('#tb_carreras #nombre_'+button.data('id') ).text() );
			//~ $('#form_carreras #slct_tipo_id').val( $('#t_carreras #tipo_id_'+button.data('id') ).text() );
			$('#form_carreras #slct_tipo_id').val( $('#tb_carreras #tipo_id_'+button.data('id') ).text() );
			//~ $('#form_carreras #slct_estado').val( $('#t_carreras #estado_'+button.data('id') ).attr("data-estado") );
			$('#form_carreras #slct_estado').val( $('#tb_carreras #estado_'+button.data('id') ).attr("data-estado") );
			$("#form_carreras").append("<input type='hidden' value='"+button.data('id')+"' name='id'>");
		}

	});

	$('#carreraModal').on('hide.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body input').val('');
	});

});

activarTabla=function(){
	$("#t_carreras").dataTable();
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

</script>
