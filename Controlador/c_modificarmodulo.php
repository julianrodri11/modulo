<?php

#se debe crear una funcion sino resulta peligroso y validar campos
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_consultas.php';
require_once '../Modelo/m_modulos.php';
require_once '../Modelo/m_valida.php ';

$idmodulo    = $_POST['idmodulo'];
$descripcion = $_POST['descripcion'];
$nombre      = $_POST['nombre'];

//$m_valida-> = new m_valida();

$m_valida  = new m_valida();
$m_modulos = new m_modulos();

$nombre            = $m_valida->caracteres($nombre);
$descripcion       = $m_valida->caracteres($descripcion);
$validadescripcion = $m_valida->carcteresEspeciales($descripcion);

$validadescripcion = $m_valida->carcteresEspeciales($descripcion);
$validanombre      = $m_valida->carcteresEspeciales($nombre);

if ($nombre == '') {
  echo "Debe ingresar un nombre para el modulo";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para el modulo";
} elseif ($validadescripcion == 2) {
  echo "Error, La descripcion del modulo no debe contener caracteres";
} elseif ($validanombre == 2) {
  echo "Error, El Nombre del modulo no debe contener caracteres";} elseif ($validanombre == 1 and $validadescripcion) {
  
  $nombre            = $m_valida->espacioBlanco($nombre);
$descripcion       = $m_valida->espacioBlanco($descripcion);

  $msj = $m_modulos->modificarModulo("modulo", $nombre, $idmodulo);
  $msj = $m_modulos->modificarModulo("descripcion", $descripcion, $idmodulo);

  echo "Datos  del Modulo Actualizados Correctamente";
}
