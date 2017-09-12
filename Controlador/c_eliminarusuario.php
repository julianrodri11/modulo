<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_usuarios.php ';
require_once '../Modelo/m_login.php ';

$id = $_POST['idusuario'];

$validaNumeroUsuario     = m_valida::validaNumeros($id);
$verifiaUsuarioExistente = m_usuarios::validaUsuarioExiste($id);

$sacarIdLogin = m_usuarios::traeridlogin($id);

$validarLlavesForaneas = m_usuarios::verificarForaneas($sacarIdLogin);
$validarRoor        = m_login::validarRoor($id);

if ($validaNumeroUsuario == 2) {
  echo "Error, El Usuario del Perfil debe ser tipo Numerico";
} elseif ($verifiaUsuarioExistente == 1) {
  echo "Error, El Usuario que intentas eliminar no existe";
}elseif ($validarRoor == 1 and $id==1) {
  echo "Error, No se puede eliminar el usuario master";
} elseif ($validarLlavesForaneas == 2) {
  echo "Error, Perfil esta referenciada en otras Tablas";
} elseif ($validaNumeroUsuario == 1 and $verifiaUsuarioExistente == 2 and $validarLlavesForaneas == 1) {

  $m_consultas = new m_consultas();
  $mensaje     = $m_consultas->eliminarCampo("usuarios", "idusuarios", $id);
  echo $mensaje;
}
