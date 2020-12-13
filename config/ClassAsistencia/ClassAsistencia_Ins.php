<?php
date_default_timezone_set('America/Bogota');
$hoy = date('Y-m-d');
 //llamamos a la connecion
require('../General/connexion.php');
//capturamos
echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    die;
// $reunion = $_POST['reunion'];
$num_cedula= $_POST['num_cedula'];
$nombre= $_POST['nombre'];
$telefono= $_POST['telefono'];
$placa= $_POST['placa'];
$valor= $_POST['valor'];
$fe_pago= $_POST['fe_pago'];
$cancela = $_POST['cancela'];
$val_abono = $_POST['val_abono'];
// $usuario = $_POST['usuario'];
//Validamos que el metodo POST este enviando datos.
if ($_POST != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $query = "INSERT INTO parqueadero.parqueadero(num_cedula, nombre, telefono, placa, valor, fe_pago, cancela, val_abono)
                  VALUES ('$num_cedula', '$nombre', '$telefono', '$placa', '$valor', '$fe_pago', '$cancela', '$val_abono')";
    $Conexion->query($query);
    header("Location: ../../operario/index.php?c=1");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  die('<h1>Por favor regrese a la pagina anterior y termine de ingresar datos.</h1>');
   // echo '<input type="hidden" id="error" name="error">'
  header("Location:../../admin/preguntas/Con_preguntas.php");
}
?>