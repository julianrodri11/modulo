<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';

$m_consultas = new m_consultas();
$id = $_POST['idperfil'];

$validaNumeroPerfil     = m_valida::validaNumeros($id);
$verifiaPerfilExistente = m_perfiles::validaPerfilExiste($id);
$validarLlavesForaneas  = m_perfiles::verificarForaneas($id);

if ($validaNumeroPerfil == 2) {
  echo "Error, El id del Perfil debe ser tipo Numerico";
} elseif ($verifiaPerfilExistente == 1) {
  echo "Error, El perfil que intentas eliminar no existe";
} elseif ($validarLlavesForaneas == 2) {
  echo "Error, Perfil esta referenciada en otras Tablas";
} elseif ($validaNumeroPerfil == 1 and $verifiaPerfilExistente == 2 and $validarLlavesForaneas == 1) {

  $mensaje = $m_consultas->eliminarCampo("perfiles", "idperfil", $id);
  echo $mensaje;
}
