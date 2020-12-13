<?php
// session_start();
include_once("../config/General/url.php");
$title = "Inicio";
include_once("../plantillas/CyP/Cabeza.php")
?>

<body>
  <div class="container">
    <?php   include "../plantillas/menu/menu_admin.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Parqueadero</h3>
        <ol class="breadcrumb">
          <li><a href=""><?php echo $title ?></a></li>
          <!-- <li><a href="Con_Asistencia.php">Asistentes</a></li>
          <li class="active">Nuevo Asistente</li> -->
        </ol>
      </div>
    </div>
  </div>
<?php
include_once("../plantillas/CyP/pie.php")
?>