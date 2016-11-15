<script type="text/javascript">
var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;

$(document).ready(function() {
    //ODE TIPO    NOMBRE DEL COLEGIO  TELEFONO    DIRECCION   Distrito    PERSONA TELEFONO    CARGO   HORARIO a
    meses=['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
    mesactual=<?php echo date("m");?>;
    año=<?php echo date("Y");?>;
    selected='';
    for (var i = 1; meses.length > i; i++) {
        selected='';
        if(mesactual*1==i*1){
            selected='selected';
        }
        if(i<10){
            i="0"+i;
        }
        $("#slct_mes").append("<option value='"+i+"' "+selected+">"+meses[i*1]+"</option>");
    }

    for (var i = año-5; i <= año; i++) {
        selected='';
        if(año==i){
            selected='selected';
        }
        $("#slct_año").append("<option value='"+i+"' "+selected+">"+i+"</option>");
    }
    cabeceraVP=[
                {
                    'id'    :'paterno',
                    'idide' :'th_paterno',
                    'nombre':'Paterno',
                    'evento':'onBlur',
                },
                {
                    'id'    :'materno',
                    'idide' :'th_materno',
                    'nombre':'Materno',
                    'evento':'onBlur',
                },
                {
                    'id'    :'nombre',
                    'idide' :'th_nombre',
                    'nombre':'Nombre',
                    'evento':'onBlur',
                },
                {
                    'id'    :'datast',
                    'idide' :'th_datast',
                    'nombre':'Data Total',
                    'evento':'',
                },
                {
                    'id'    :'colegiost',
                    'idide' :'th_datast',
                    'nombre':'Colegios',
                    'evento':'',
                },
                {
                    'id'    :'seminariost',
                    'idide' :'th_datast',
                    'nombre':'Seminarios',
                    'evento':'',
                }
                ];

        for(i=0; i<cabeceraVP.length; i++)
        {
            targetsVP++;
            columnDefsVP.push({
                "targets": targetsVP,
                "data": cabeceraVP[i].id,
                "name": cabeceraVP[i].id
            });

            if(cabeceraVP[i].evento=='onBlur'){
            $("#t_produccion>thead>tr:eq(1)").append('<th class="unread" id="'+cabeceraVP[i].idide+'">'
                +cabeceraVP[i].nombre+'<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '
                +cabeceraVP[i].evento+'="MostrarAjax(\'produccion\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
                '</th>');
            
            }
            else{
                $("#t_produccion>thead>tr:eq(1)").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
            }
            $("#t_produccion>tfoot>tr").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
        
        }
        $('#t_produccion').dataTable();
        targetsVP++;

    MostrarAjax('produccion');

    $("select[name='slct_todo']").change(function(){
        var mFiltro = $(this).val();
        if(mFiltro!="")
        {
            $("#form_filtros").submit();
        }
    });

});

MostrarAjax=function(t){
    if( t=="produccion" )
    {
        oSeminario.Cargar(columnDefsVP);
    }
}
</script>
