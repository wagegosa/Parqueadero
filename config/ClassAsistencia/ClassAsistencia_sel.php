 <?php
  date_default_timezone_set('America/Bogota');

class Asistencia extends DataBase
{
	public $id;
  public $num_cedula;
  public $nombre;
  public $telefono;
  public $placa;
  public $valor;
  public $fe_pago;
	public $cancela;
  public $val_abono;
  public function listarAsistencia(){
    $hoy = date('Y-m-d');
    try
    {
      parent::Conexion();
      $sql = "SELECT id, num_cedula, nombre, telefono, placa, valor, fe_pago,
                     cancela, val_abono 
                FROM parqueadero.parqueadero
                ORDER BY fe_pago ASC";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
}
?>
