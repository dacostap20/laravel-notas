<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> <?php echo e($estudiante->nombre); ?> </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">estudiante</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h2><?php echo e($estudiante->nombre); ?></h2>
                        </div>
                        <hr>
                        <br>
                        <div class="d-flex justify-content-between">
                            <b>Identificacion:</b>
                            <p><?php echo e($estudiante->documento); ?> </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Edad:</b>
                            <p><?php echo e($estudiante->edad); ?> </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Curso:</b>
                            <p><?php echo e($estudiante->estudianteCurso->informacionCurso->curso); ?></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <b>Grado:</b>
                            <p><?php echo e($estudiante->estudianteCurso->informacionCurso->grado); ?></p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <b>Telefono Acudiente:</b>
                            <p><?php echo e($estudiante->telefonoPadres); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Promedio Actual:</b>
                            <p><?php echo e(isset($estudiante->promedio) ? $estudiante->promedio:'No hay notas'); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <button type="button" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#agregar" data-whatever="@mdo">Asignar Materia a estudiante </button>
                <br>
                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Asignar Materia </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('materiaEstudiante')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="idEstudiante" value="<?php echo e($estudiante->id); ?>">
                                    <select name="idMateria" class="form-control">
                                        <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=" <?php echo e($materia->id); ?> "><?php echo e($materia->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <br>
                                    <button type="submit" value="enviar" class="btn btn-success" id="buttoAccion">Asignar</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Materia</th>
                                            <th>Promedio</th>
                                            <th>Agregar Nota</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $materiasEstudiante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materiaEstudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($materiaEstudiante->informacionMateria->nombre); ?></td>
                                                <td><?php echo e(isset($materiaEstudiante->promedioTotal)?$materiaEstudiante->promedioTotal:'No hay notas'); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" style="width: 100%" data-toggle="modal" data-target="#agregarnota<?php echo e($materiaEstudiante->id); ?>" data-whatever="@mdo">agregar nota </button>
                                                    <div class="modal fade" id="agregarnota<?php echo e($materiaEstudiante->id); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel">Nota Materia </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('calificarMateriaEstudiante')); ?>" method="post" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>

                                                                            <input type="hidden" name="idMateriaEstudiante" value="<?php echo e($materiaEstudiante->id); ?>">
                                                                            <input type="number" class="form-control" name="nota" placeholder="Ingrese Nota 0 a 10" min="0" max="10" step="0.01">
                                                                            <br>
                                                                            <input type="text" class="form-control" name="observacion" placeholder="Concepto">
                                                                        <br>
                                                                        <button type="submit" value="enviar" class="btn btn-success" id="buttoAccion">Calificar</button>
                                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success" style="width: 100%" data-toggle="modal" data-target="#verNotas<?php echo e($materiaEstudiante->id); ?>" data-whatever="@mdo">Ver notas </button>
                                                    <div class="modal fade" id="verNotas<?php echo e($materiaEstudiante->id); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"> Detalle </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Materia</th>
                                                                                <th>Nota</th>
                                                                                <th>Detalle</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $__currentLoopData = $todasNotasMaterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todasNotasMateria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($todasNotasMateria->idMateriaEstudiante == $materiaEstudiante->id): ?>
                                                                                    <tr>
                                                                                        <td><?php echo e($todasNotasMateria->infoMateriaEstudiante->informacionMateria->nombre); ?></td>
                                                                                        <td> <?php echo e($todasNotasMateria->nota); ?> </td>
                                                                                        <td> <?php echo e($todasNotasMateria->observacion); ?> </td>
                                                                                    </tr>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!----fin-->
        </div>
    </div>
    <br>
    <div class="row mt2">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title">Detalle de calificaciones</h4>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Nota</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $todasNotasMaterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todasNotasMateria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($todasNotasMateria->infoMateriaEstudiante->informacionMateria->nombre); ?></td>
                                    <td> <?php echo e($todasNotasMateria->nota); ?> </td>
                                    <td> <?php echo e($todasNotasMateria->observacion); ?> </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Diego\codigos\prueba-laravel-colegio\resources\views/estudiantes/fichaEstudiante.blade.php ENDPATH**/ ?>