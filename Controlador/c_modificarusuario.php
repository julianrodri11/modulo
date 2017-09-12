<?php

#se debe crear una funcion sino resulta peligroso y validar campos
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_consultas.php';
require_once '../Modelo/m_usuarios.php ';
require_once '../Modelo/m_valida.php';

$idusuario = $_POST['idusuario'];

$identificacion  = $_POST['identificacion'];
$nombre          = $_POST['nombre1'];
$apellido        = $_POST['apellido1'];
$fechanacimiento = $_POST['fechanacimiento'];
$perfil          = $_POST['SelectPerfil'];
$modelo          = new m_usuarios();
$valida          = new m_valida();

$validaNumeros = $valida->validaNumeros($identificacion);
$nombre        = $valida->caracteres($nombre);
$apellido      = $valida->caracteres($apellido);

$validaNomCaracteres    = $valida->carcteresEspeciales($nombre);
$validaApellidoCaracter = $valida->carcteresEspeciales($apellido);

if ($identificacion == '') {
  echo "Debe ingresar el Numero de Identificacion del usuario";
} elseif ($nombre == '') {
  echo "Debe ingresar el Nombre del usuario";
} elseif ($validaNumeros == 2) {
  echo "La Identificacion debe ser solo Numerica";
} elseif ($validaNomCaracteres == 2) {
  echo "El Nombre del Usuario no debe contener caracteres";
} elseif ($validaApellidoCaracter == 2) {
  echo "El Apellido del Usuario no debe contener caracteres";
} elseif ($identificacion == '' | $nombre == '' | $apellido == '') {
  echo "Verifique que todos los campos se encuentren rellenados";
} elseif ($validaApellidoCaracter == 1 and $validaNomCaracteres == 1 and $validaNumeros == 1) {

$nombre        = $valida->espacioBlanco($nombre);
$apellido      = $valida->espacioBlanco($apellido);
  
  $msj = $modelo->modificarUsuario("numeroid", $identificacion, $idusuario);
  $msj = $modelo->modificarUsuario("nombre1", $nombre, $idusuario);
  $msj = $modelo->modificarUsuario("apellido1", $apellido, $idusuario);
  $msj = $modelo->modificarUsuario("fechanacimiento", $fechanacimiento, $idusuario);
  $msj = $modelo->modificarUsuario("idperfil", $perfil, $idusuario);

  echo "Usuario modificado correctamente";
}
