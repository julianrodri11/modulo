<?php

#se debe crear una funcion sino resulta peligroso y validar campos
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_consultas.php';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_valida.php ';

$idperfil = $_POST['idperfil'];
/*$conexion = new Consultas();
$conexion->get_datos("perfiles", "*", "$idperfil");*/
$descripcion = $_POST['descripcion'];
$perfil      = $_POST['nombre'];

//m_valida:: = new m_valida();
//$m_perfiles= new m_perfiles();

$perfil      = m_valida::caracteres($perfil);
$descripcion = m_valida::caracteres($descripcion);

$validaCaracterPerfil      = m_valida::carcteresEspeciales($perfil);
$validaCaracterDescripcion = m_valida::carcteresEspeciales($descripcion);

//validar parametros antes de enviar ...crear funcion
if ($perfil == '') {
  echo "Debe ingresar un nombre para el Perfil";
} elseif ($descripcion == '') {
  echo "Debe ingresar una descripcion para el Perfil";
} elseif ($validaCaracterPerfil == 2) {
  echo "El Nombre de la Perfil no puede contener caracteres especiales";
} elseif ($validaCaracterDescripcion == 2) {
  echo "La Descripcion no puede contener caracteres especiales";
} elseif ($validaCaracterPerfil == 1 and $validaCaracterDescripcion == 1) {

	$perfil      = m_valida::espacioBlanco($perfil);
$descripcion = m_valida::espacioBlanco($descripcion);

  $msj = m_perfiles::modificarPerfil("descripcion", $descripcion, $idperfil);
  $msj = m_perfiles::modificarPerfil("perfil", $perfil, $idperfil);

  echo "Datos  del Perfil Actualizados Correctamente";
} else {
  echo "Error Inesperado";
}
