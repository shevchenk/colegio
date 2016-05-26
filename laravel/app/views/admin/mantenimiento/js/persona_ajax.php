<script type="text/javascript">
var persona_id, cargos_selec=[], PersonaObj;
var Persona={
    AgregarEditarPersona:function(AE){
        var datos=$("#form_personas").serialize().split("txt_").join("").split("slct_").join("");
        var accion="persona/crear";
        if(AE==1){
            accion="persona/editar";
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
                    $('#t_personas').dataTable().fnDestroy();

                    Persona.CargarPersonas(activarTabla);
                    msjG.mensaje("success",obj.msj,5000);
                    $('#personaModal .modal-footer [data-dismiss="modal"]').click();
                    cargos_selec=[];
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
    CargarPersonas:function(evento){
        $.ajax({
            url         : 'persona/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
                slctGlobal.listarSlct('cargo','slct_cargos','simple');//para que cargue antes el cargo
            },
            success : function(obj) {
                if(obj.rst==1){
                    HTMLCargarPersona(obj.datos);
                    PersonaObj=obj.datos;
                }
                $(".overlay,.loading-img").remove();
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                msjG.mensaje("danger","Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.",3000);
            }
        });
    },
    CargarCargos:function(persona_id){
        //getOpciones
        $.ajax({
            url         : 'persona/cargarcargos',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : {persona_id:persona_id},
            async       : false,
            beforeSend : function() {
                
            },
            success : function(obj) {
                //CARGAR areas
                var html="";
                $.each(obj.datos,function(index,data){
                    html+="<li class='list-group-item'><div class='row'>";
                    html+="<div class='col-sm-4' id='cargo_"+data.id+"'><input type='hidden' value='"+data.id+"' name='cargos_selec[]' ><h5>"+$("#slct_cargos option[value=" +data.id +"]").text()+"</h5></div>";
                    
                    html+='<div class="col-sm-2">';
                    html+='<button type="button" id="'+data.id+'" Onclick="EliminarArea(this)" class="btn btn-danger btn-sm" >';
                    html+='<i class="fa fa-minus fa-sm"></i> </button></div>';
                    html+="</div></li>";
                    cargos_selec.push(data.id);
                });

                $("#t_cargoPersona").html(html);
            },
            error: function(){
            }
        });
    },
    CambiarEstadoPersonas:function(id,AD){
        $("#form_personas").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_personas").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_personas").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'persona/cambiarestado',
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
                    $('#t_personas').dataTable().fnDestroy();
                    Persona.CargarPersonas(activarTabla);
                    msjG.mensaje("success",obj.msj,5000);
                    $('#personaModal .modal-footer [data-dismiss="modal"]').click();
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
};
</script>
