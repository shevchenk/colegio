<script type="text/javascript">
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','multiple');
    slctGlobalHtml('slct_distrito','multiple');
    $("#btn_reporte").click(Exportar);
});

Cargar=function(){
var data={multiple:1,ode:$("#slct_ode").val()};
    if(  $.isArray($("#slct_ode").val()) && $("#slct_ode").val().length>0 ){
        $('#slct_distrito').multiselect('destroy');
        slctGlobal.listarSlct('ode_distrito','slct_distrito','multiple',null,data);
    }
}

Exportar=function(){
    $("#form_filtros").submit();
}
</script>
