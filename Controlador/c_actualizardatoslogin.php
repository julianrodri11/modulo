<?php
session_start();
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_usuarios.php';
require_once '../Modelo/m_login.php';
require_once '../Modelo/m_consultas.php';

$selectTipoId    = $_POST['selectTipoId'];
$identificacion  = $_POST['identificacion'];
$pnombre         = $_POST['pnombre'];
$snombre         = $_POST['snombre'];
$papellido       = $_POST['papellido'];
$sapellido       = $_POST['sapellido'];
$fechanacimiento = $_POST['fechanacimiento'];
$correo          = $_SESSION['correo'];
$idPerfil        = "2";//VARIABLE QUE SIRVE PARA COLOCAR UN USUARIO COMO ESTANDAR CON LOS MINIMOS PRIVILEGIOS

$validaCorreo   = m_valida::validaCorreo($correo);
$verificacorreo = m_login::validarCorreo($correo);

$validaNumeros   = m_valida::validaNumeros($identificacion);
$pnombre         = m_valida::caracteres($pnombre);
$snombre         = m_valida::caracteres($snombre);
$papellido       = m_valida::caracteres($papellido);
$sapellido       = m_valida::caracteres($sapellido);
$fechanacimiento = m_valida::caracteres($fechanacimiento);

$validacaracterpNombre = m_valida::carcteresEspeciales($pnombre);
$validacaractersNombre = m_valida::carcteresEspeciales($snombre);

$validacaracterpApellido = m_valida::carcteresEspeciales($papellido);
$validacaracterSapellido = m_valida::carcteresEspeciales($sapellido);

if (!isset($_POST['selectTipoId']) || empty($_POST['selectTipoId'])) {
  echo "Por favor seleccione el tipo de identificacion";
} elseif (!isset($_POST['identificacion']) || empty($_POST['identificacion'])) {
  echo "Falta ingresar el numero de identificacion";
} elseif (!isset($_POST['pnombre']) || empty($_POST['pnombre'])) {
  echo "Hace falta ingresar el Primer nombre";
} elseif (!isset($_POST['papellido']) || empty($_POST['papellido'])) {
  echo "Hace falta ingresar el Primer apellido";
} elseif ($pnombre == '' | $papellido == '' | $identificacion == '') {
  echo "Falta Ingresal algunos datos de caracter oblogatorio como: Nimero identificacion, Tipo de identificacion, Primer Nombre  o Primer apellido";
} elseif ($validaNumeros == 2) {
  echo "La identificacion debe ser Tipo numerica";
} elseif ($validacaracterpNombre == 2) {
  echo "El Primer nommbre del usuario no debe contener caracteres especiales";
} elseif ($validacaractersNombre == 2) {
  echo "El Segundo nommbre del usuario no debe contener caracteres especiales";
} elseif ($validacaracterpApellido == 2) {
  echo "El Primer Apellido del usuario no debe contener caracteres especiales";
} elseif ($validacaracterSapellido == 2) {
  echo "El Segundo apellido del usuario no debe contener caracteres especiales";
} elseif ($validaCorreo == 2) {
  echo "EL correo debe estar segmentado de la siguiente manera, micorreo@example.com";
} elseif ($verificacorreo == 2) {
  echo "EL correo no se encuentra registrado en la BD";
} elseif ($validaNumeros == 1 and $validacaracterpNombre == 1 and $validacaractersNombre == 1 and $validacaracterpApellido == 1 and $validacaracterSapellido == 1 and $validaCorreo == 1 and $verificacorreo == 1) {

$pnombre         = m_valida::espacioBlanco($pnombre);
$snombre         = m_valida::espacioBlanco($snombre);
$papellido       = m_valida::espacioBlanco($papellido);
$sapellido       = m_valida::espacioBlanco($sapellido);
$fechanacimiento = m_valida::espacioBlanco($fechanacimiento);
  
  
  $maxid         = m_consultas::get_ultimovalor("usuarios", "idusuarios");
  $idlogin       = m_consultas::get_idCorreo($correo);
  $insertarDatos = m_usuarios::insertarDatos($selectTipoId, $identificacion, $pnombre, $snombre, $papellido, $sapellido, $fechanacimiento,$idlogin);
  echo "Datos Ingresados correctamente";

}
