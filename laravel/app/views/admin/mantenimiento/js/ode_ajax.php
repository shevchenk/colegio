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
				console.log(obj);
				//~ var html="";
				//~ var estadohtml="";
				//~ if(obj.rst==1){
					//~ $.each(obj.aData,function(index,data){
						//~ estadohtml = '<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger btn-xs">Inactivo</span>';
						//~ if(data.estado == 1){
							//~ estadohtml = '<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success btn-xs">Activo</span>';
						//~ }
//~ 
						//~ html+="<tr>"+
							//~ "<td id='nombre_"+data.id+"'>"+data.carrera+"</td>"+
							//~ "<td id='tipo_id_"+data.id+"' tipo_id='"+data.tipo_id+"'>"+data.tipo_carrera+"</td>"+
							//~ "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
							//~ '<td><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#carreraModal" data-id="'+data.id+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';
						//~ html+="</tr>";
//~ 
					//~ });
				//~ }
				//~ $("#tb_carreras").html(html);
				//~ evento();
			},
			error: function(){
			}
		});
	},
	cargarTipos:function(accion,menu_id){
		$.ajax({
			url : 'carrera/listartipo',
			type : 'POST',
			cache : false,
			dataType : 'json',
			success : function(obj) {
				//~ console.log(obj);
				if(obj.rst==1){
					$('#slct_tipo_id').html('');
					$.each(obj.aData,function(index,data){
						$('#slct_tipo_id').append('<option value='+data.id+'>'+data.nombre+'</option>');
					});
					if (accion==='nuevo')
						$('#slct_tipo_id').append("<option selected style='display:none;'>--- Elige Menu ---</option>");
					else
					   $('#slct_tipo_id').val( menu_id );
				}
			}
		});
	},
	AgregarEditarOpciones:function(AE){
		var datos=$("#form_carreras").serialize().split("txt_").join("").split("slct_").join("");
		var accion="carrera/crear";
		if(AE==1){
			accion="carrera/editar";
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
					$('#t_carreras').dataTable().fnDestroy();

					Carreras.CargarOpciones(activarTabla);
					msjG.mensaje("success",obj.msj,5000);
					$('#carreraModal .modal-footer [data-dismiss="modal"]').click();
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
		$("#form_carreras").append("<input type='hidden' value='"+id+"' name='id'>");
		$("#form_carreras").append("<input type='hidden' value='"+AD+"' name='estado'>");
		var datos=$("#form_carreras").serialize().split("txt_").join("").split("slct_").join("");
		//~ console.log(id);
		//~ console.log(AD);
		console.log(datos);
		$.ajax({
			url : 'carrera/cambiarestado',
			type : 'POST',
			cache : false,
			dataType : 'json',
			//~ data : datos,
			data : {id: id, estado:AD},
			beforeSend : function() {
				$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
			},
			success : function(obj) {
				$(".overlay,.loading-img").remove();
				if(obj.rst==1){
					$('#t_carreras').dataTable().fnDestroy();
					Carreras.CargarOpciones(activarTabla);
					msjG.mensaje("success",obj.msj,5000);
					$('#carreraModal .modal-footer [data-dismiss="modal"]').click();
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
	}
};
</script>
