<script type="text/javascript">
$(document).ready(function() {
    slctGlobal.listarSlct('ode','slct_ode','multiple');
    slctGlobal.listarSlct('distrito','slct_distrito','multiple');
    //slctGlobalHtml('slct_distrito','multiple');
    $("#btn_reporte").click(Exportar);

    $(".fecha").datetimepicker({
        format: "yyyy-mm-dd",
        language: 'es',
        showMeridian: true,
        time:true,
        minView:2,
        autoclose: true,
        todayBtn: false
    });
});
/*
Cargar=function(){
var data={multiple:1,ode:$("#slct_ode").val()};
    if(  $.isArray($("#slct_ode").val()) && $("#slct_ode").val().length>0 ){
        $('#slct_distrito').multiselect('destroy');
        slctGlobal.listarSlct('ode_distrito','slct_distrito','multiple',null,data);
    }
}*/

Exportar=function(){
    $("#form_filtros").submit();
}
</script>
