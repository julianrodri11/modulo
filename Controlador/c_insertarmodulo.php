<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php ';

$modulo      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$m_valida  = new m_valida();
$m_modulos = new m_modulos();

$modulo      = $m_valida->caracteres($modulo);
$descripcion = $m_valida->caracteres($descripcion);

$validaCaracterModulo      = $m_valida->carcteresEspeciales($modulo);
$validaCaracterDescripcion = $m_valida->carcteresEspeciales($descripcion);
$validaModuloExixtente     = $m_modulos->validaModuloE($modulo);

//validar parametros antes de enviar ...crear funcion

if ($modulo == '') {
  echo "Debe ingresar un nombre para el modulo";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para el modulo";
} elseif ($validaModuloExixtente == 2) {
  echo "El Modulo ya Exixte";
} elseif ($validaCaracterModulo == 2) {
  echo "El Nombre del modulo no puede contener caracteres especiales";
} elseif ($validaCaracterDescripcion == 2) {
  echo "La Descripcion no puede contener caracteres especiales";
} elseif ($validaModuloExixtente == 1 and $validaCaracterDescripcion == 1 and $validaCaracterModulo == 1) {
$modulo      = $m_valida->espacioBlanco($modulo);
$descripcion = $m_valida->espacioBlanco($descripcion);
	
  $mensaje = $m_modulos->insertarModulo($modulo, $descripcion);
  echo "EL Modulo fue creado Exitosamente";
}
