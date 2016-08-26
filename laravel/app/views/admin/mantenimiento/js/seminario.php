<script type="text/javascript">
$(document).ready(function() {

    $('#colegioModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var titulo = button.data('titulo');
        var modal = $(this);

        modal.find('.modal-title').text(titulo+' Colegio');
        $('#form_colegios [data-toggle="tooltip"]').css("display","none");
        $("#form_colegios input[type='hidden']").remove();
        
        if(titulo=='Nuevo') {
            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
        }
        else {
            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
        }

    });

});

</script>
