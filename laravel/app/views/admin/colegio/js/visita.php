<script type="text/javascript">
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','simple');
    slctGlobalHtml('slct_campaña','simple');
});

Cargar=function(evento,id){
    if( id=='' ){
        id=0;
    }

    if( evento=='cam' ){
        var data={ode:id};
        $('#slct_campaña').multiselect('destroy');
        slctGlobal.listarSlct('cam','slct_campaña','simple',null,data);
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

