<?php
//INICIO DE SESION
session_name('controlarintentos');
session_start();
//FUNCION PARA MOSTRAR EL FORMULARIO
function mostrar_form()
{
// ESTE ES EL FORMULARIO
  echo '<form name="login" action="" method="POST">';
  echo 'Usuario: <input type="text" name="usuario"><br />';
  echo 'Password: <input type="password" name="pswd"><br />';
  echo '<br />';
  echo '<input type="submit" value=" Enviar ">';
  echo '</form>';

  include_once 'menu.php';
  include_once 'opciones.php';
  include_once 'footer.php';
  include_once 'links.php';

}
//NUMERO DE INTENTOS PERMITIDOS
$permitidos = 3;
//TIEMPO POR EL QUE NO PODRA LOGUEARSE SI HA SOBREPASADO EL NUMERO PERMITIDO DE INTENTOS (en segundos)
$tiempo = 20; //20 segundos
// PRIMERO VERIFICAMOS SI PUEDE SEGUIR LOGUEANDOSE O DEBE ESPERAR ALGUN TIEMPO
if (isset($_SESSION['tiempo_fuera'])) {
// Comprobamos cuanto tiempo ha pasado:
  $tiempo_ahora = time() - $_SESSION['tiempo_fuera'];
  if ($tiempo_ahora < $tiempo) {
    $tiempo_restante = $tiempo - $tiempo_ahora;
// ESTO SI NO PUEDE LOGUEARSE
    die('Debes esperar ' . $tiempo_restante . ' segundos para poder intentar el login de nuevo.<br /><br /><a href="intentos.php">Recargar página</a>');
  } else {
    unset($_SESSION['tiempo_fuera']);
  }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
// ESTO ES TODO LO QUE SE HARA AL ENVIAR EL FORMULARIO
  // LUEGO VEMOS CUANTOS INTENTOS VA
  if (!isset($_SESSION['intentos'])) {
    $intento              = 0;
    $_SESSION['intentos'] = $intentos;
  } else {
    $intento = $_SESSION['intentos'];
  }
// LUEGO COMPARAMOS CON EL NUMERO DE INTENTOS PERMITIDOS
  if ($intento >= $permitidos) {
// LO QUE PASARA SI HA SOBREPASADO EL NUMERO DE INTENTOS VALIDOS
    unset($_SESSION['intentos']);
    $_SESSION['tiempo_fuera'] = time();
    die('Ha sobrepasado el numero permitido de intentos de login. No podra loguearse por ' . $tiempo . ' segundos.<br /><br /><a href="intentos.php">Recargar página</a>');
  } else {
// CONTABILIZAMOS EL INTENTO
    $intento++;
/*
AQUI VERIFICAS SI LOS DATOS SON CORRECTOS Y TODO ESO....
SI NO LO SON CREAS UNA VARIABLE $acceso = 0;
SI LO SON, CREAS LA VARIABLE $acceso = 1;
 */
// ALGO ASI PARA ESTE CASO... ESTO TU DEBES CAMBIAR POR TUS CONSULTAS A LA BD Y TODO ESO
    if ($_POST['usuario'] == 'admin' && $_POST['pswd'] == 'abc') {
      $acceso = 1;
    } else {
      $acceso = 0;
    }
// FIN VERIFICACION DE DATOS
    if ($acceso == 1) {
// BORRAMOS LAS VARIABLES DE SESION
      unset($_SESSION['tiempo_fuera'], $_SESSION['intentos']);
// AQUI REDIRIGES O LO QUE SEA Q HAYA Q HACER SI EL LOGIN ES CORECTO
      die('Login correcto');
    } else {
// GUARDAMOS EL INTENTO Y REGRESAMOS AL LOGIN
      $_SESSION['intentos'] = $intento;
      echo 'datos incorrectos, vas ' . $intento . ' intentos <br />';
      mostrar_form();
    }
  }
} else {
//MOSTRAMOS EL FORMULARIO
  mostrar_form();
}
