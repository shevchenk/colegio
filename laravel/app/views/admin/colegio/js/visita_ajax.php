<script type="text/javascript">
var CargoObj;
var Visita={
    ColegioPersona:function(evento,datos){
        $.ajax({
            url         : 'persona/cargarp',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento(obj.data);
                if( obj.data.length==0 ){
                    msjG.mensaje("danger","No hay personas registradas",5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    Colegio:function(evento){
        var datos=$("#form_vista").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'colegio/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento(obj.aData);
                if( obj.aData.length==0 ){
                    msjG.mensaje("danger","No hay colegios para el distrito seleccionado",5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    ColegioDetalle:function(evento){
        var datos=$("#form_vista").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'colegio/cargardetalle',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento(obj.aData);
                if( obj.aData.length==0 ){
                    msjG.mensaje("danger","El colegio no cuenta con grados y secciones registrados",5000);
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    Crear:function(evento){
        var datos=$("#form_vista").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'visita/crear',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                evento();
                msjG.mensaje("success",obj.msj,3000);
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    }
};
</script>
