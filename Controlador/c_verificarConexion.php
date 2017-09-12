<?php


$user   = $_POST['usuario'];
$pass   = $_POST['pass'];
$host   = $_POST['host'];
$port   = $_POST['port'];
$motor   = $_POST['motor'];
$basededatos   = $_POST['basededatos'];


if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {	
	echo "Favor ingresar el nombre del usuario para poder conectarse a la base de datos";
}elseif(!isset($_POST['host']) || empty($_POST['host']))  {
	echo "Favor ingresar el el Hostin para poder realizar la conexion";
}elseif(!isset($_POST['port']) || empty($_POST['port']))  {
	echo "Favor ingresar puerto para poder realizar la conexion";
}elseif(!isset($_POST['basededatos']) || empty($_POST['basededatos']))  {
	echo "Favor ingresar un nombre para la base de datos";
}elseif ($user!='' and $host!='') {


 try {
      $conexion = new PDO("$motor:host=$host;port=$port;", $user, $pass);
      $conexion->query("SET NAMES 'utf8'");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "conexion establecida";
    } catch (PDOException $e) {
      echo 'Falló la conexión, Por favor verificar los datos de la conexion';
    }
    $conexion = null;
}  
    ?>