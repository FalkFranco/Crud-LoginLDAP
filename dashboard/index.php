<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <!-- <h1>Contenido principal</h1 -->
    <h1 class="text-uppercase text-xl-center">Sistema <?php echo Rol($_SESSION["s_rol"]) ?></h1>
    <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="img/hero.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Bienvenidos al Sistema de Gestión - Redes 2022</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br>
<?php require_once "vistas/parte_inferior.php"?>