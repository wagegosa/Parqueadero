<?php 
//Conexión a la base de datos
require "../../config/General/connexion.php";
//Llamado a la clase
include "../../config/ClassAsistencia/ClassAsistencia_sel.php";

$usuario   = new Asistencia();
$Lista = $usuario->listarAsistencia();

$alert = 'Se <strong>Actualizarón</strong> los datos corrrectamente';
include_once("../../config/General/url.php");
$title = "Parqueadero";
include_once("../../plantillas/CyP/Cabeza.php");
?>
  <body>
    <div class="container">
      <?php   include "../../plantillas/menu/menu_admin.php"; ?>
      <?php if($_GET != null){?>
      <div class="alert alert-success"><?php echo isset($alert) ? $alert : ''; ?></div>
      <?php } ?>
      <div class="row">
        <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Parqueadero</h3>
          <ol class="breadcrumb">
            <li><a href="">Inicio</a></li>
            <li><a href="index.php"><?php echo $title; ?></a></li>
            <li class="active">Listado de <?php echo $url_completa; ?></li>
          </ol>
          <div class="pull-right">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
              <a href="index.php" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Nueva Asistencia </a>
            </form>
          </div>
        </div>
      </div>

      
      <div class="row">
        <div class="col-md-12">
        <form id="Con_Area" name="Con_Area" method="post">
            <div class="input-group">
              <span class="input-group-addon">
                  <i class="glyphicon glyphicon-search"></i>
              </span>
              <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in   a name">
            </div>
           <table class="table table-bordered  table-hover table-striped" id="myTable" width="100%" name="myTable">
            <thead>
              <tr>
                <th data-filterable="false">Nro</th>
                <th data-breakpoints="xs sm">Nombre</th>
                <th data-breakpoints="xs sm">Fecha</th>
                <th data-breakpoints="xs sm">placa</th>
                <th data-breakpoints="xs sm">Cancelo</th>
                <th data-breakpoints="xs sm" data-filterable="false">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $c=1;
                foreach($Lista as $libro):
              ?>
              <tr>
                <td><?= $c++; ?></td>
                <td><?= $libro->nombre; ?></td>
                <td><?= $libro->fe_pago; ?></td>
                <td><?= $libro->placa; ?></td>
                <td><?php if($libro->cancela == 2){ echo "Cancelo";}else{ echo "Abono";}; ?></td>
                <td>
                  <a href="Edi_Asistencia.php?id=<?= $libro->id;?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
  <?php
  include_once("../../plantillas/CyP/pie.php");
  ?>
  </body>
</html>