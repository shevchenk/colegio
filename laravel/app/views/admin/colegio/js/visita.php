<script type="text/javascript">
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','simple');
    slctGlobalHtml('slct_campaña','simple');
});

Cargar=function(evento,id){
    if( id=='' ){
        id=0;
    }

    if( evento=='dis' ){
        var data={ode:id};
        $('#slct_distrito').multiselect('destroy');
        slctGlobal.listarSlct('distrito','slct_distrito','simple',null,data);
    }
    else if( evento=='col' ){

    }
}

Mostrar=function(evento){
    if( evento=='col' ){
        $("#div_colegio").toggle();
    }
}
</script>

