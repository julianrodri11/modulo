<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php';

$opcion      = $_POST['nombre'];
$idModulo      = $_POST['idModulo'];
$descripcion = $_POST['descripcion'];
$ruta        = $_POST['ruta'];

$opcion      = m_valida::caracteres($opcion);
$descripcion = m_valida::caracteres($descripcion);
$ruta        = m_valida::caracteres($ruta);

$validaCaracterOpcion      = m_valida::carcteresEspeciales($opcion);
$validaCaracterDescripcion = m_valida::carcteresEspeciales($descripcion);
$validaCaracterRuta        = m_valida::carcteresEspeciales($ruta);
$validaOpcionExixtente     = m_opciones::validarExistenciaFuncionalidad($opcion,$idModulo);

//validar parametros antes de enviar ...crear funcion
if ($opcion == '') {
  echo "Debe ingresar un nombre para la Opcion";
}elseif ($idModulo=='') {
  echo "Favor Seleccionar el Modulo al que corresponde la Opcion";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para la Opcion";
} elseif ($ruta == '') {
  echo "Debe ingresar direccion para la ruta de la Opcion";
} elseif ($validaOpcionExixtente == 2) {
  echo "La Opcion ya Exixte";
} elseif ($validaCaracterOpcion == 2) {
  echo "El Nombre de la Opcion no puede contener caracteres especiales";
} elseif ($validaCaracterDescripcion == 2) {
  echo "La Descripcion no puede contener caracteres especiales";
} elseif ($validaCaracterRuta == 2) {
  echo "La Ruta no puede contener caracteres especiales";
} elseif ($validaCaracterOpcion == 1 and $validaCaracterDescripcion == 1 and $validaCaracterRuta == 1 and $validaOpcionExixtente == 1) {
  $opcion      = m_valida::espacioBlanco($opcion);
$descripcion = m_valida::espacioBlanco($descripcion);
$ruta        = m_valida::espacioBlanco($ruta);

  $mensaje = m_opciones::insertarOpcion($opcion, $descripcion, $ruta,$idModulo);
  echo "La Opcion fue creado Exitosamente";
} else {
  echo "Error Inesperado";
}
