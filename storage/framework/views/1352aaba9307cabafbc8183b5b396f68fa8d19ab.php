    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Api </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Api</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" id="btn-consulta">Obtener datos</button>
        <div id="respuesta"></div>
        <br>
        <table id="sortable-table-2" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody id="datos">

            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $("#btn-consulta").click(function() {
                    $.ajax({
                        type: "GET",
                        url: "/api/data",
                        dataType: "json",
                        success: function(response) {
                            $("#respuesta").html("La letra más utilizada es: " + response.letraMasUsada);
                            $("#datos").html('');
                            var valor = ''
                            response.lista.forEach(function(d) {
                                valor += '<tr>' +
                                        '<td>' + d.name.first + ' ' + d.name.last + '</td>' +
                                        '</tr>';
                            });
                            $("#datos").html(valor);
                        }
                    });
                });
            });
        </script>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Diego\codigos\prueba-laravel-colegio\resources\views/vistaApi.blade.php ENDPATH**/ ?>