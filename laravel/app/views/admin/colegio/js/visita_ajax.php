<script type="text/javascript">
var CargoObj;
var Visita={
    Colegio:function(AE){
        var datos=$("#form_vista").serialize().split("txt_").join("").split("slct_").join("");
        var accion="cargo/crear";
        if(AE==1){
            accion="cargo/editar";
        }

        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $('#t_cargos').dataTable().fnDestroy();

                    msjG.mensaje("success",obj.msj,5000);
                    $('#cargoModal .modal-footer [data-dismiss="modal"]').click();
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
