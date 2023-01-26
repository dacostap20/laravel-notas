<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Crear estudiantes </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Información</a></li>
                <li class="breadcrumb-item active" aria-current="page">General</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-description"> Agregue estudiante </p>
            <form class="form-sample" action="<?php echo e(url('crear-estudiante')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                </div>
                <div class="form-group">
                    <label for="">Identificación</label>
                    <input type="number" class="form-control" name="documento" placeholder="Numero de identificación">
                </div>
                <div class="form-group">
                    <label for="">Edad</label>
                    <input type="number" class="form-control" name="edad" placeholder="Ingrese años cumplidos">
                </div>
                <div class="form-group">
                    <label for="">Elija curso </label>
                    <select name="curso" class="form-control">
                        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($curso->id); ?>"><?php echo e($curso->curso); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Telefono contacto</label>
                    <input type="text" class="form-control" name="telefono" placeholder="ingrese telefono">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-lg" style="width: 100%" type="submit">Crear Estudiante</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Estadiante</th>
                            <th>Documento</th>
                            <th>Fecha creacion</th>
                            <th>Curso</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($estudiante->nombre); ?></td>
                                <td><?php echo e($estudiante->documento); ?></td>
                                <td><?php echo e($estudiante->created_at); ?></td>
                                <td><?php echo e($estudiante->estudianteCurso->informacionCurso->curso); ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?php echo e(route('fichaEstudiante', ['idEstudiante' => $estudiante->id])); ?>"> Ver </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Diego\codigos\prueba-laravel-colegio\resources\views/estudiantes/crearEstudiante.blade.php ENDPATH**/ ?>