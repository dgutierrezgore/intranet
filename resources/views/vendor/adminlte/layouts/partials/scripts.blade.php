<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

    $(document).on('click', 'span[rel="eliminar"]', function (e) {
        $(this).parent().parent().remove();
    })

    $("#combo_dispo").prop('disabled', true);
</script>

<script>
    $(function () {

        $('#GrillaPrincipal').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,

            language: {
                info: "Mostrando Página _PAGE_ de _PAGES_",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                search: "Buscar:",
                paginate: {
                    first: "Primero",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior"
                },
                lengthMenu: "Mostrando _MENU_ registros",
                emptyTable: "No existen registros en la Base de Datos",
            },
        })
    })
</script>

<script>
    $(function () {

        $('#GrillaPrincipal2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,

            language: {
                info: "Mostrando Página _PAGE_ de _PAGES_",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                search: "Buscar:",
                paginate: {
                    first: "Primero",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior"
                },
                lengthMenu: "Mostrando _MENU_ registros",
                emptyTable: "No existen registros en la Base de Datos",
            },
        })
    })
</script>

<script>
    $(function () {

        $('#GrillaPrincipal3').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,

            language: {
                info: "Mostrando Página _PAGE_ de _PAGES_",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                search: "Buscar:",
                paginate: {
                    first: "Primero",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior"
                },
                lengthMenu: "Mostrando _MENU_ registros",
                emptyTable: "No existen registros en la Base de Datos",
            },
        })
    })
</script>
<script>
    $('#combo_equi').on('change', function () {

// Guardamos el select de cursos
        var cursos = $("#combo_dispo");

        // Guardamos el select de alumnos
        var alumnos = $(this);

        if ($(this).val() != '') {
            $.ajax({
                data: {
                    "id": alumnos.val(),
                    "_token": "{{ csrf_token() }}",
                },
                url: 'TraeDisponibilidadHard',
                type: 'POST',
                dataType: 'json',

                beforeSend: function () {
                    alumnos.prop('disabled', true);
                },
                success: function (r) {
                    alumnos.prop('disabled', false);

                    // Limpiamos el select
                    cursos.find('option').remove();

                    $(r).each(function (i, v) { // indice, valor
                        cursos.append('<option value="' + v.idinfdispohard + '">' + v.fechadispo + ' - ' + v.jornadadispo + '</option>');
                    })

                    cursos.prop('disabled', false);
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                    alumnos.prop('disabled', false);
                }
            });
        } else {
            cursos.find('option').remove();
            cursos.prop('disabled', true);
        }

    });

</script>

