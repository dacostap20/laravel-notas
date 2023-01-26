<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Colegio</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
  </head>
  <body class="sidebar-dark">
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="pt-2 pb-1">
            <span class="nav-item-head">Menu</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/')); ?>">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('agregar-estudiante')); ?>">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Administrar Estudiantes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('vista-api')); ?>">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Usar Api</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">


            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <h4>Diego Andres Acosta</h4>
              </li>
            </ul>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <?php echo $__env->yieldContent('content'); ?>
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. All rights reserved.</span>

            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo e(URL::asset('js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>-->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
<?php /**PATH E:\Diego\codigos\prueba-laravel-colegio\resources\views/layouts/master.blade.php ENDPATH**/ ?>