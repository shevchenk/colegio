<script type="text/javascript">
var Colegios = {
	CargarOpciones:function(evento){
		$.ajax({
			url : 'colegio/cargar',
			type : 'POST',
			cache : false,
			dataType : 'json',
			beforeSend : function() {

			},
			success : function(obj) {
				var html="";
				var sEstado="";
				if(obj.rst==1){
					$.each(obj.aData,function(index,data)
					{
						sEstado = '<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger btn-xs">Inactivo</span>';
						if(data.estado == 1){
							sEstado = '<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success btn-xs">Activo</span>';
						}

						html+="<tr>"+
							"<td id='ode_"+data.id+"' ode_id='"+data.ode_id+"'>"+data.ode+"</td>"+
							"<td id='nombre_"+data.id+"'>"+data.nombre+"</td>"+
							"<td id='tipo_"+data.id+"' tipo_id='"+data.colegio_tipo_id+"'>"+data.tipo+"</td>"+
							"<td id='nivel_"+data.id+"' nivel_id='"+data.colegio_nivel_id+"'>"+data.nivel+"</td>"+
							"<td id='departamento_"+data.id+"' departamento_id='"+data.departamento_id+"'>"+data.departamento+"</td>"+
							"<td id='provincia_"+data.id+"' provincia_id='"+data.provincia_id+"'>"+data.provincia+"</td>"+
							"<td id='distrito_"+data.id+"' distrito_id='"+data.distrito_id+"'>"+data.distrito+"</td>"+
							"<td id='direccion_"+data.id+"'>"+data.direccion+"</td>"+
							"<td id='referencia_"+data.id+"'>"+data.referencia+"</td>"+
							"<td id='persona_"+data.id+"' persona_id='"+data.persona_id+"'>"+data.persona+"</td>"+
							"<td id='telefono_"+data.id+"'>"+data.telefono+"</td>"+
							"<td id='celular_"+data.id+"'>"+data.celular+"</td>"+
							"<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+sEstado+"</td>"+
							'<td>'+
								'<a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#colegioModal" data-id="'+data.id+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i></a>'+
								'<a class="btn btn-info btn-xs" data-toggle="modal" data-target="#detalleModal" data-id="'+data.id+'" data-titulo="'+data.nombre+'">Detalle <i class="fa fa-share fa-1x"></i></a>'+
							'</td>';
						html+="</tr>";

					});
				}
				$("#tb_colegios").html(html);
				evento();
			},
			error: function(){
			}
		});
	},
	cargarSelect:function(sLista, sUrl, sSelector, sAccion, nId)
	{
		$.post(sUrl, { accion: "" }, function(oData) {
			if(oData.rst==1){
				$(sSelector).html('');
				$.each(oData.aData,function(idx,row){
					$(sSelector).append('<option value='+row.id+'>'+row.nombre+'</option>');
				});
				if (sAccion==='nuevo')
					$(sSelector).append("<option value='' selected style='display:none;'>--- Seleccionar "+sLista+" ---</option>");
				else
					$(sSelector).val(nId);
			}
		}, "json");
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
		var datos=$("#form_colegios").serialize().split("txt_").join("").split("slct_").join("");
		var accion="colegio/crear";
		if(AE==1){
			accion="colegio/editar";
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
					$('#t_colegios').dataTable().fnDestroy();

					Colegios.CargarOpciones(activarTabla);
					msjG.mensaje("success",obj.msj,5000);
					$('#colegioModal .modal-footer [data-dismiss="modal"]').click();
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
		$("#form_colegios").append("<input type='hidden' value='"+id+"' name='id'>");
		$("#form_colegios").append("<input type='hidden' value='"+AD+"' name='estado'>");
		var datos=$("#form_colegios").serialize().split("txt_").join("").split("slct_").join("");
		$.ajax({
			url : 'colegio/cambiarestado',
			type : 'POST',
			cache : false,
			dataType : 'json',
			data : {id: id, estado:AD},
			beforeSend : function() {
				$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
			},
			success : function(obj) {
				$(".overlay,.loading-img").remove();
				if(obj.rst==1){
					$('#t_colegios').dataTable().fnDestroy();
					Colegios.CargarOpciones(activarTabla);
					msjG.mensaje("success",obj.msj,5000);
					$('#colegioModal .modal-footer [data-dismiss="modal"]').click();
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
	AgregarEditarDetalle:function(){
		var aData=$("#form_detalle").serialize().split("txt_").join("").split("slct_").join("");
		var oGrado = $("select[name='slct_grado[]']");
		if(oGrado.length <=0)
		{
			msjG.mensaje("danger","No existe datos para guardar",5000);
			return false;
		}
		$.ajax({
			url : 'colegio/modificardetalle',
			type : 'POST',
			cache : false,
			dataType : 'json',
			data : aData,
			beforeSend : function() {
				$("body").append('<div class="overlay"></div><div class="loading-img"></div>');
			},
			success : function(obj) {
				$(".overlay,.loading-img").remove();
				msjG.mensaje("success",obj.msj,5000);
				$('#detalleModal .modal-footer [data-dismiss="modal"]').click();
			},
			error: function(){
				$(".overlay,.loading-img").remove();
				msjG.mensaje("danger","Ocurrio una interrupción en el proceso,, Favor de intentar nuevamente.",3000);
			}
		});
	},
	cargarDetalle:function(nIdColegio)
	{
		var oGrado = { "1": "1", "2": "2", "3": "3", "4": "4", "5": "5", "6": "6" };
		var oNivel = { "1": "Inicial", "2": "Primaria", "3": "Secundaria" };
		var oTurno = { "M": "Ma&ntilde;ana", "T": "Tarde", "N": "Noche" };

		$('.tblDetalle tbody').html('<div class="loading-img"></div>');
		$.post('colegio/cargardetalle', { colegio_id: nIdColegio }, function(oData) {
			if(oData.rst==1) {

				var sHtml = "", sGrado = "", sNivel = "", sTurno = "";
				$.each(oData.aData,function(idx,row){

					sHtml = "", sGrado = "", sNivel = "", sTurno = "";

					sGrado +="<select name='slct_grado[]' class='form-control input-sm'>";
					$.each(oGrado,function(idxGrado,rowGrado){
						if(idxGrado == row.grado) {
							sGrado += '<option value='+idxGrado+' selected>'+rowGrado+'</option>';
						} else {
							sGrado += '<option value='+idxGrado+'>'+rowGrado+'</option>';
						}
					});
					sGrado += "</select>";

					sNivel +="<select name='slct_nivel[]' class='form-control input-sm'>";
					$.each(oNivel,function(idxNivel,rowNivel){
						if(idxNivel == row.nivel_id) {
							sNivel += '<option value='+idxNivel+' selected>'+rowNivel+'</option>';
						} else {
							sNivel += '<option value='+idxNivel+'>'+rowNivel+'</option>';
						}
					});
					sGrado += "</select>";

					sTurno +="<select name='slct_turno[]' class='form-control input-sm'>";
					$.each(oTurno,function(idxTurno,rowTurno){
						if(idxTurno == row.turno_id) {
							sTurno += '<option value='+idxTurno+' selected>'+rowTurno+'</option>';
						} else {
							sTurno += '<option value='+idxTurno+'>'+rowTurno+'</option>';
						}
					});
					sTurno += "</select>";

					sHtml += "<tr class='row_"+row.id+"'>"+
								"<td>"+sGrado+"</td>"+
								"<td><input type='text' name='txt_seccion[]' class='form-control input-sm' value='"+row.seccion+"'/></td>"+
								"<td>"+sNivel+"</td>"+
								"<td>"+sTurno+"</td>"+
								"<td><input type='hidden' name='txt_accion[]' class='form-control input-sm' value='U' />"+
								"<input type='hidden' name='txt_id[]' class='form-control input-sm' value='"+row.id+"' />"+
								"<a class='btn btn-danger btn-xs btnQuitar' id_row='"+row.id+"'>"+
									"<i class='fa fa-times fa-1x'></i></a></td>"+
							"</tr>";

					$('.tblDetalle tbody').append(sHtml);
				});

			}
			$(".overlay,.loading-img").remove();
		}, "json");
	}
};
</script>
