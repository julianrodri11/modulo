<?php
if (isset($_GET['var']) and !empty($_GET['var'])) {
  //echo "TOKEN ".$_GET['var'];
  require_once '../Modelo/Conexion.php';
  require_once '../Modelo/m_login.php';
  #hace falta validar con el IF de una linea si es tiene algo entonces lo mande de lo contrario null
  $token = $_GET['var'];

  //validar parametros antes de enviar ...crear funcion
  //$login   = new m_login();
  $mensaje = m_login::verificartoken($token);

  if ($mensaje == 'ERRORTOKENVENCIDO') {

    echo "<script>alert('Error el token tiene un tiempo maximo de caducidad de 24 horas y ha vencido, puede volver a generar un nuevo');
    location.href='../index.php';
    </script>";

  } elseif ($mensaje == 'TOKENNOEXISTE') {

    echo "<script> alert('Error al token no existe o no esta asociado a ninguna cuenta de correo');
    location.href='../index.php';cerrar.php
    </script>";

  } else {

    echo "<script> alert(" . $mensaje . ")</script>";
  }

} else {
  echo "variable no declarada";
}
