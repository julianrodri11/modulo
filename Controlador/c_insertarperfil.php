<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php ';

$perfil      = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$modeValida = new m_valida();
$m_perfiles = new m_perfiles();

$perfil      = $modeValida->caracteres($perfil);
$descripcion = $modeValida->caracteres($descripcion);

$validaCaracterPerfil      = $modeValida->carcteresEspeciales($perfil);
$validaCaracterDescripcion = $modeValida->carcteresEspeciales($descripcion);
$validaPerfilExixtente     = $m_perfiles->validaperfilE($perfil);

//validar parametros antes de enviar ...crear funcion
if ($perfil == '') {
  echo "Debe ingresar un nombre para el Perfil";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para el Perfil";
} elseif ($validaPerfilExixtente == 2) {
  echo "El Perfil ya Exixte";
} elseif ($validaCaracterPerfil == 2) {
  echo "El Nombre de la Perfil no puede contener caracteres especiales";
} elseif ($validaCaracterDescripcion == 2) {
  echo "La Descripcion no puede contener caracteres especiales";
} elseif ($validaCaracterPerfil == 1 and $validaCaracterDescripcion == 1 and $validaPerfilExixtente == 1) {
	$perfil      = $modeValida->espacioBlanco($perfil);
	$descripcion = $modeValida->espacioBlanco($descripcion);
	
  $mensaje = $m_perfiles->insertarPerfil($perfil, $descripcion);
  echo "El perfil fue creado Exitosamente";
} else {
  echo "Error Inesperado";
}
