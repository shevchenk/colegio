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
							"<td id='responsable_"+data.id+"'>"+$.trim(data.responsable)+"</td>"+
							"<td id='departamento_id_"+data.id+"' departamento_id='"+data.departamento_id+"'>"+data.departamento+"</td>"+
							"<td id='provincia_id_"+data.id+"' provincia_id='"+data.provincia_id+"'>"+data.provincia+"</td>"+
							"<td id='distrito_id_"+data.id+"' distrito_id='"+data.distrito_id+"'>"+data.distrito+"</td>"+
							"<td id='direccion_"+data.id+"'>"+data.direccion+"</td>"+
							"<td id='telefono_"+data.id+"'>"+data.telefono+"</td>"+
							"<td id='email_"+data.id+"'>"+data.email+"</td>"+
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
					var sPintar = "";
					if(sUrl=="ode/listardistrito")
					{
						if(row.pintar!="No")
						{
							sPintar = 'style="background-color:#F77867"';
						}
					}
					$(sSelector).append('<option value='+row.id+' '+sPintar+'>'+row.nombre+'</option>');
				});
				if (sAccion==='nuevo')
					$(sSelector).append("<option selected style='display:none;'>--- Seleccionar "+sLista+" ---</option>");
				else
					$(sSelector).val(nId);
			}
		}, "json");
	},
	cargarSelectAnidadoOptionHtml:function(sUrl, nId, nIdPadre){
		var sOption = "";
		$.ajax({
			type: 'POST',
			url: sUrl,
			data: { id_padre: nIdPadre },
			dataType: 'json',
			async: false,
			success: function(oData){
				if(oData.rst==1){
					$.each(oData.aData,function(idx,row){
						var sPintar = "";
						if(sUrl=="ode/listardistrito")
						{
							if(row.pintar!="No")
							{
								sPintar = 'style="background-color:#F77867"';
							}
						}
						if(nId == row.id) {
							sOption += "<option value='"+row.id+"' "+sPintar+" selected>"+row.nombre+"</option>";
						} else {
							sOption += "<option value='"+row.id+"' "+sPintar+">"+row.nombre+"</option>";
						}
					});
				}
			}
		});
		return sOption;
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
		$("#form_odes").append("<input type='hidden' value='"+id+"' name='id'>");
		$("#form_odes").append("<input type='hidden' value='"+AD+"' name='estado'>");
		var datos=$("#form_odes").serialize().split("txt_").join("").split("slct_").join("");
		$.ajax({
			url : 'ode/cambiarestado',
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
	cargarDetalle:function(nIdOde)
	{
		var mDepartamento = JSON.parse(localStorage.getItem("oDepartamento"));
		var oDepartamento = JSON.parse(mDepartamento);

		$('.tblDetalle tbody').html('<div class="loading-img"></div>');
		$.post('ode_distrito/listardetalle', { ode_id: nIdOde }, function(oData) {
			if(oData.rst==1)
			{
				var sHtml = "", sDepartamento = "", sProvincia = "", sDistrito = "";
				var oDate = new Date();
				var nTime = oDate.getSeconds() + "" + oDate.getTime();
				$.each(oData.aData,function(idx,row)
				{
					sHtml = "", sDepartamento = "", sProvincia = "", sDistrito= "";

					sDepartamento +="<select name='slct_ode_departamento_id[]' class='form-control input-sm sltDepartamento' id='"+nTime+row.id+"'>";
					$.each(oDepartamento, function( idxDep, rowDep ) {
						if(idxDep == row.departamento_id) {
							sDepartamento += "<option value='"+idxDep+"' selected>"+rowDep+"</option>";
						} else {
							sDepartamento += "<option value='"+idxDep+"'>"+rowDep+"</option>";
						}
					});
					sDepartamento += "</select>";

					sProvincia += "<select class='form-control input-sm sltProvincia' name='slct_ode_provincia_id[]' id='pro_"+nTime+row.id+"' id_padre='"+nTime+row.id+"'>"
									+Odes.cargarSelectAnidadoOptionHtml("colegio/listarprovincia",row.provincia_id,row.departamento_id)
								+"</select>";

					sDistrito += "<select class='form-control input-sm sltDistrito' name='slct_ode_distrito_id[]' id='dis_"+nTime+row.id+"' id_padre='"+nTime+row.id+"'>"
									+Odes.cargarSelectAnidadoOptionHtml("ode/listardistrito",row.distrito_id,row.provincia_id)
								+"</select>";

					sHtml += "<tr class='row_"+row.id+"'>"+
								"<td>"+sDepartamento+"</td>"+
								"<td>"+sProvincia+"</td>"+
								"<td>"+sDistrito+"</td>"+
								"<td><input type='hidden' name='txt_accion[]' class='form-control input-sm' value='U' />"+
								"<input type='hidden' name='txt_id_detalle[]' class='form-control input-sm' value='"+row.id+"' />"+
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
