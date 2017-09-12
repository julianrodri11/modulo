<?php class Conexion
{
  public function get_Conexion()
  {
    $motor = "mysql";
    $user  = "root";
    $pass  = "";
    $host  = "localhost";
    $db    = "jamil";
    $port    = "3306";
    try {
      $conexion = new PDO("$motor:host = $host;port=$port;dbname=$db;", $user, $pass);
      $conexion->query("SET NAMES 'utf8'");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } catch (PDOException $e) {
      echo 'Falló la conexión: ' . $e->getMessage();
    }

  }

  public function cerrar_Conexion()
  {
    self::$conexion = null;
  }

} ?>
