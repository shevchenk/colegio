<script type="text/javascript">
var cabeceraVP=[];
var columnDefsVP=[];
var targetsVP=-1;

$(document).ready(function() {
    //ODE TIPO    NOMBRE DEL COLEGIO  TELEFONO    DIRECCION   Distrito    PERSONA TELEFONO    CARGO   HORARIO a
    cabeceraVP=[
                {
                    'id'    :'ode',
                    'idide' :'th_ode',
                    'nombre':'Ode',
                    'evento':'onBlur',
                },
                {
                    'id'    :'tipo_colegio',
                    'idide' :'th_tipo_colegio',
                    'nombre':'Tipo Colegio',
                    'evento':'onBlur',
                },
                {
                    'id'    :'colegio',
                    'idide' :'th_colegio',
                    'nombre':'Colegio',
                    'evento':'onBlur',
                },
                {
                    'id'    :'telefono',
                    'idide' :'th_telefono',
                    'nombre':'Telefono',
                    'evento':'onBlur',
                },
                {
                    'id'    :'direccion',
                    'idide' :'th_direccion',
                    'nombre':'Direcci&oacute;n',
                    'evento':'onBlur',
                },
                {
                    'id'    :'distrito',
                    'idide' :'th_distrito',
                    'nombre':'Distrito',
                    'evento':'onBlur',
                },
                {
                    'id'    :'persona',
                    'idide' :'th_persona',
                    'nombre':'Persona',
                    'evento':'onBlur',
                },
                {
                    'id'    :'celular',
                    'idide' :'th_celular',
                    'nombre':'Celular',
                    'evento':'onBlur',
                },
                {
                    'id'    :'cargo',
                    'idide' :'th_cargo',
                    'nombre':'Cargo',
                    'evento':'onBlur',
                },
                {
                    'id'    :'horario',
                    'idide' :'th_horario',
                    'nombre':'Horario',
                    'evento':'onBlur',
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

            $("#t_seminario>thead>tr:eq(1)").append('<th class="unread" id="'+cabeceraVP[i].idide+'">'
                +cabeceraVP[i].nombre+'<input name="txt_'+cabeceraVP[i].id+'" id="txt_'+cabeceraVP[i].id+'" '
                +cabeceraVP[i].evento+'="MostrarAjax(\'seminario\');" onKeyPress="return enterGlobal(event,\''+cabeceraVP[i].idide+'\',1)" type="text" placeholder="'+cabeceraVP[i].nombre+'" />'+
                '</th>');
            $("#t_seminario>tfoot>tr").append('<th class="unread">'+cabeceraVP[i].nombre+'</th>');
        
        }
        $('#t_seminario').dataTable();
        targetsVP++;

    MostrarAjax('seminario');

    $("select[name='slct_todo']").change(function(){
        var mFiltro = $(this).val();
        if(mFiltro!="")
        {
            $("#form_filtros").submit();
        }
    });

});

MostrarAjax=function(t){
    if( t=="seminario" )
    {
        oSeminario.Cargar(columnDefsVP);
    }
}
</script>
