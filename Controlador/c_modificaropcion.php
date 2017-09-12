<?php

require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_opciones.php';
require_once '../Modelo/m_valida.php';
require_once '../Modelo/m_consultas.php';

$idopcion = $_POST['idopcion'];
//$conexion = new Consultas();

$opcion      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$ruta        = $_POST['ruta'];

$m_valida   = new m_valida();
$m_opciones = new m_opciones();

$opcion      = $m_valida->caracteres($opcion);
$descripcion = $m_valida->caracteres($descripcion);
$ruta        = $m_valida->caracteres($ruta);

$validaCaracterOpcion      = $m_valida->carcteresEspeciales($opcion);
$validaCaracterDescripcion = $m_valida->carcteresEspeciales($descripcion);
$validaCaracterRuta        = $m_valida->carcteresEspeciales($ruta);

//validar parametros antes de enviar ...crear funcion

if ($opcion == '') {
  echo "Debe ingresar un nombre para la Opcion";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para la Opcion";
} elseif ($ruta == '') {
  echo "Debe ingresar direccion para la ruta de la Opcion";
} elseif ($validaCaracterOpcion == 2) {
  echo "El Nombre de la Opcion no puede contener caracteres especiales";
} elseif ($validaCaracterDescripcion == 2) {
  echo "La Descripcion no puede contener caracteres especiales";
} elseif ($validaCaracterRuta == 2) {
  echo "La Ruta no puede contener caracteres especiales";
} elseif ($validaCaracterOpcion == 1 and $validaCaracterDescripcion == 1 and $validaCaracterRuta == 1) {
$opcion      = $m_valida->espacioBlanco($opcion);
$descripcion = $m_valida->espacioBlanco($descripcion);
$ruta        = $m_valida->espacioBlanco($ruta);
  
  $msj = $m_opciones->modificarOpcion("nombre", $opcion, $idopcion);
  $msj = $m_opciones->modificarOpcion("ruta", $ruta, $idopcion);
  $msj = $m_opciones->modificarOpcion("descripcion", $descripcion, $idopcion);
  echo "La Opcion fue Modificada Exitosamente";
} else {
  echo "Error Inesperado";
}
