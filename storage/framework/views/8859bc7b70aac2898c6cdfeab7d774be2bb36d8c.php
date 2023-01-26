<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/themes/sea.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/themes/light_provence.min.js"></script>
<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> General </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Información</a></li>
                <li class="breadcrumb-item active" aria-current="page">General</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <a class="nav-link" href="<?php echo e(url('agregar-estudiante')); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5>Total Estudiantes</h5>
                                <p> <?php echo e($conteoEstudiantes); ?> </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="nav-link" href="<?php echo e(url('ver-cursos')); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5>Total Cursos</h5>
                                <p> <?php echo e($conteoCursos); ?> </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="nav-link" href="<?php echo e(url('ver-materias')); ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5>Total Materias</h5>
                                <p> <?php echo e($conteoMaterias); ?> </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="col-12">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div style="width: 100%; height: 450px; margin: 0; padding: 0;" id="grafMejoresEstudiantes"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div style="width: 100%; height: 450px; margin: 0; padding: 0;" id="grafpeoresEstudiantes"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var graficaMejoresEstudiantes = <?php echo json_encode($graficaMejoresEstudiantes, 15, 512) ?>;
    var graficaPeoresEstudiantes = <?php echo json_encode($graficaPeoresEstudiantes, 15, 512) ?>;
</script>
<script>
    anychart.onDocumentReady(function () {

        // create data
        /*var data = [
            ["Coltanques Barranquilla", 0, 10.8],
            ["Coltanques Bogota", 0, 8.5],
            ["Coca-cola Bogota", 0, 6.3],
            ["Coca-cola Medellin", 0, 6.1],
        ];
        console.log(data);*/
        var dataGraficaEstudiantes = [];
        graficaMejoresEstudiantes.forEach(function(e) {
            //console.log(e);
            let interno=[e.documento,0,parseInt(e.promedio)];
            dataGraficaEstudiantes.push(interno);
        });
        // create a chart
        var chart = anychart.bar();

        // create a range bar series and set the data
        var series = chart.rangeBar(dataGraficaEstudiantes);

        // set the chart title
        chart.title("Mejores Estudiantes");

        // set the titles of the axes
        //chart.xAxis().title("Zona");
        //chart.yAxis().title("Tiempo");

        // set the container id
        chart.container("grafMejoresEstudiantes");

        // initiate drawing the chart
        chart.draw();
    });
    anychart.onDocumentReady(function () {
        var dataGraficaEstudiantes = [];
        graficaPeoresEstudiantes.forEach(function(e) {
            //console.log(e);
            let interno=[e.documento,0,parseInt(e.promedio)];
            dataGraficaEstudiantes.push(interno);
        });
        var chart = anychart.bar();
        var series = chart.rangeBar(dataGraficaEstudiantes);
        chart.title("Estudiantes Bajo Promedio");
        chart.container("grafpeoresEstudiantes");
        chart.draw();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Diego\codigos\prueba-laravel-colegio\resources\views/principal/principal.blade.php ENDPATH**/ ?>