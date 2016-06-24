<script type="text/javascript">
var Odes = {
	CargarOpciones:function(evento){
		$.ajax({
			url : 'ode/grilla',
			type : 'POST',
			cache : false,
			dataType : 'json',
			beforeSend : function() {

			},
			success : function(obj) {
				var html="";
				var estadohtml="";
				if(obj.rst==1){
					$.each(obj.aData,function(index,data){
						estadohtml = '<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger btn-xs">Inactivo</span>';
						if(data.estado == 1){
							estadohtml = '<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success btn-xs">Activo</span>';
						}

						html+="<tr>"+
							"<td id='nombre_"+data.id+"'>"+data.nombre+"</td>"+
							"<td id='departamento_id_"+data.id+"' departamento_id='"+data.departamento_id+"'>"+data.departamento+"</td>"+
							"<td id='provincia_id_"+data.id+"' provincia_id='"+data.provincia_id+"'>"+data.provincia+"</td>"+
							"<td id='distrito_id_"+data.id+"' distrito_id='"+data.distrito_id+"'>"+data.distrito+"</td>"+
							"<td id='direccion_"+data.id+"'>"+data.direccion+"</td>"+
							"<td id='telefono_"+data.id+"'>"+data.telefono+"</td>"+
							"<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
							'<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#odeModal" data-id="'+data.id+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';
						html+="</tr>";

					});
				}
				$("#tb_odes").html(html);
				evento();
			},
			error: function(){
			}
		});
	},
	cargarSelectAnidado:function(sLista, sUrl, sSelector, sAccion, nId, nIdPadre)
	{
		$.post(sUrl, { id_padre: nIdPadre }, function(oData) {
			if(oData.rst==1){
				$(sSelector).html('');
				$.each(oData.aData,function(idx,row){
					$(sSelector).append('<option value='+row.id+'>'+row.nombre+'</option>');
				});
				if (sAccion==='nuevo')
					$(sSelector).append("<option selected style='display:none;'>--- Seleccionar "+sLista+" ---</option>");
				else
					$(sSelector).val(nId);
			}
		}, "json");
	},
	AgregarEditarOpciones:function(AE){
		var datos=$("#form_odes").serialize().split("txt_").join("").split("slct_").join("");
		var accion="ode/agregar";
		if(AE==1){
			accion="ode/actualizar";
		}

		$.ajax({
			url : accion,
			type : 'POST',
			cache : false,
			dataType : 'json',
			data : datos,
			beforeSend : function() {
				$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
			},
			success : function(obj) {
				$(".overlay,.loading-img").remove();
				if(obj.rst==1){
					$('#t_odes').dataTable().fnDestroy();

					Odes.CargarOpciones(activarTabla);
					msjG.mensaje("success",obj.msj,5000);
					$('#odeModal .modal-footer [data-dismiss="modal"]').click();
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
	CambiarEstadoOpciones:function(id,AD){
		//~ $("#form_carreras").append("<input type='hidden' value='"+id+"' name='id'>");
		//~ $("#form_carreras").append("<input type='hidden' value='"+AD+"' name='estado'>");
		//~ var datos=$("#form_carreras").serialize().split("txt_").join("").split("slct_").join("");
		//~ console.log(datos);
		//~ $.ajax({
			//~ url : 'carrera/cambiarestado',
			//~ type : 'POST',
			//~ cache : false,
			//~ dataType : 'json',
			//~ data : {id: id, estado:AD},
			//~ beforeSend : function() {
				//~ $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
			//~ },
			//~ success : function(obj) {
				//~ $(".overlay,.loading-img").remove();
				//~ if(obj.rst==1){
					//~ $('#t_carreras').dataTable().fnDestroy();
					//~ Carreras.CargarOpciones(activarTabla);
					//~ msjG.mensaje("success",obj.msj,5000);
					//~ $('#carreraModal .modal-footer [data-dismiss="modal"]').click();
				//~ }
				//~ else{
					//~ $.each(obj.msj,function(index,datos){
						//~ $("#error_"+index).attr("data-original-title",datos);
						//~ $('#error_'+index).css('display','');
					//~ });
				//~ }
			//~ },
			//~ error: function(){
				//~ $(".overlay,.loading-img").remove();
				//~ msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
			//~ }
		//~ });
	}
};
</script>
