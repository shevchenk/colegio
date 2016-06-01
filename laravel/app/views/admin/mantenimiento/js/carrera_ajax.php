<script type="text/javascript">
var Carreras = {
	CargarOpciones:function(evento){
		$.ajax({
			url : 'carrera/cargar',
			type : 'POST',
			cache : false,
			dataType : 'json',
			beforeSend : function() {

			},
			success : function(obj) {
				var html="";
				var estadohtml="";
				if(obj.rst==1){
					console.log(obj.aData);
				}
				$("#tb_carreras").html(html);
				evento();
			},
			error: function(){
			}
		});
	}
};
</script>
