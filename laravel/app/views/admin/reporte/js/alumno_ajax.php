<script type="text/javascript">
var oSeminario = {
    Cargar:function(columnDefs){
    $('#t_produccion').dataTable().fnDestroy();
    $('#t_produccion')
        .on( 'page.dt',   function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
        .on( 'search.dt', function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
        .on( 'order.dt',  function () { $("body").append('<div class="overlay"></div><div class="loading-img"></div>'); } )
        .DataTable( {
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "searching": false,
            "ordering": false,
            "stateLoadCallback": function (settings) {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            "stateSaveCallback": function (settings) { // Cuando finaliza el ajax
                $(".overlay,.loading-img").remove();
            },
            "ajax": {
                "url": "produccion/cargar",
                "type": "POST",
                "data": function(d)
                {
                    datos=$("#form_filtros").serialize().split("txt_").join("").split("slct_").join("").split("%5B%5D").join("[]").split("+").join(" ").split("%7C").join("|").split("%C3%B1").join("ñ").split("&");
                    for (var i = datos.length - 1; i >= 0; i--)
                    {
                        if( datos[i].split("[]").length>1 )
                        {
                            d[ datos[i].split("[]").join("["+contador+"]").split("=")[0] ] = datos[i].split("=")[1];
                            contador++;
                        }
                        else
                        {
                            d[ datos[i].split("=")[0] ] = datos[i].split("=")[1];
                        }
                    };
                },
            },
            columnDefs
        } );
    }
};
</script>
