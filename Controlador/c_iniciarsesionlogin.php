<?php session_start();
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_login.php ';

$mensaje = null;
$tiempo  = 20;
$_SERVER['REMOTE_ADDR'];

#hace falta validar con el fi de una linea si es tiene algo entonces lo mande de lo contrario null

if (!isset($_SESSION['intento']) || empty($_SESSION['intento'])) {
  $_SESSION['intento'] = 0;
}
if (!isset($_POST['txt_correo']) || empty($_POST['txt_correo'])) {
  echo "Ingrese el Correo del usuario";

}
if (!isset($_POST['txt_contrasena']) || empty($_POST['txt_contrasena'])) {
  echo "Falta ingresar la contraseña";

} else {
  $_SESSION['intentos'] = null;
  $correo               = $_POST['txt_correo'];
  $contrasena           = $_POST['txt_contrasena'];

  $modeValida  = new m_valida();
  $m_login     = new m_login();
  $m_consultas = new m_consultas();
  $correo      = $modeValida->caracteres($correo);

  if ($_SESSION['intentos'] == 0) {

    $mensaje                 = $m_login->iniciarsesionLogin($correo, $contrasena);
    $traerIdlogin            = $m_consultas->get_idCorreo($correo);
    $verificaDatodPersonales = $m_login->verificaDatodPersonales($traerIdlogin);

    if ($mensaje != 2) {

      $_SESSION['correo'] = $correo;
      $validarRoor        = $m_login->validarRoor($traerIdlogin);

      if ($validarRoor == 1 and $mensaje != 2) {
        echo "Bienvenido Administrador";

      } elseif ($validarRoor == 2 and $mensaje != 2) {

        if ($verificaDatodPersonales == 2) {
          echo "Es nesesario actualizar los datos, Por favor Presione Aceptar para Hacerlo";
        } elseif ($verificaDatodPersonales == 1) {
          echo "Bienvenido";

          $_SESSION['hora'] = date("Y-n-j H:i:s");
        }
      }
    }}

  if ($mensaje == 2) {
    $intento = 1;
    $intento = $_SESSION['intento'];

    if ($intento <= 3) {

      $intento = $intento + 1;
      //header('location:../index.php');
      echo "Error, Usuario o contraseña incorrectos";
      $_SESSION['intento'] = $intento;

    } else {
      $_SESSION['hora'] = date("Y-n-j H:i:s");
      echo "Su IP a sido bloqueada, Usted a sobrepasado el numero de intentos permitidos, Por favor intente ingresar nuevamente dentro de 30 segundos";
      $_SESSION['hora']   = date("Y-n-j H:i:s");
      $_SESSION['estado'] = "INACTIVO";
      //20 segundos
      // PRIMERO VERIFICAMOS SI PUEDE SEGUIR LOGUEANDOSE O DEBE ESPERAR ALGUN TIEMPO

    }
  }

  if ($_SESSION['intentos'] >= 4) {
    header('location:../error.php');
  }}
