<?php 
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d');
//Conexión a la base de datos
require "../../config/General/connexion.php";
// Class
$alert = 'Se <strong>Almacenaron</strong> los datos corrrectamente';
include_once("../../config/General/url.php");
$title = "Ingreso Nuevo";
include_once("../../plantillas/CyP/Cabeza.php");
?>
<body>
  <div class="container">
    <?php include "../../plantillas/menu/menu_admin.php"; ?>
    <?php if($_GET != null){?>
      <div class="alert alert-success"><?php echo isset($alert) ? $alert : ''; ?></div>
    <?php } ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Parqueadero</h3>
        <ol class="breadcrumb">
          <li><a href="">Inicio</a></li>
          <li><a href="">Parqueadero</a></li>
          <li class="active"><?php echo $title; ?></li>
        </ol>
      </div>
    </div>
    <!-- contador
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <span class="user">Asistencias Resgistradas: <?php foreach ($asis as $listarU): echo $listarU->contador; endforeach;?> </span>
      </div>
    </div><br> -->
    <!-- Formulario -->
    <form method="post" autocomplete="on" id="frm" action="<?php echo $url_completa;?>config/ClassAsistencia/ClassAsistencia_Ins.php">
      <!-- Cedula -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Nombre">Cedula:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="number" class="form-control" name="num_cedula" rows="5" id="num_cedula" minlength="7" maxlength="10" placeholder="Cedula">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Nombre -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="Hora">Nombre Completo</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- telefono -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Telefono:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono" minlength="7" maxlength="10">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Tipo de Vehiculo -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Tipo Vehiculo:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <Select id="Tip_vehiculo" class="form-control">
            <option value="0">Selecciones</option>
            <option value="1">Carro</option>
            <option value="2">Moto</option>
          </Select>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Placa -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">Placa:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Valor -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="email">valor:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="valor" id="valor" placeholder="Valor">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <!-- Fceha pago -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="fe_pago">Fecha pago:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="date" class="form-control" name="fe_pago" id="fe_pago" placeholder="Fecha pago" min="<?php echo $hoy;?>">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label class="form-check-label" for="exampleCheck1">Cancela</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="radio" name="cancela" id="cancela" value="2"  onclick="ocultar()">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label class="form-check-label" for="exampleCheck1">Abona</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="radio" name="cancela" id="cancela" value="1" onclick="mostrar()" checked>
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div class="row" id="Abona">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <label for="fe_pago">Valor Abono:</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <input type="text" class="form-control" name="val_abono" id="val_abono" placeholder="Valor Abono">
          <span class="help-block" id="error"></span>
        </div>
      </div>
      <div><br> 
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      </div>
    </form>
  <?php include_once("../../plantillas/CyP/pie.php");?>
  <script>
  function ocultar() {
    document.getElementById('Abona').style.display = 'none';
  }
  function mostrar(){
    document.getElementById('Abona').style.display = 'block';
  }
  </script>
  </body>
</html>