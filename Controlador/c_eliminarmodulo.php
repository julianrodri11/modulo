<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_modulos.php ';

$m_consultas            = new m_consultas();
$id                     = $_POST['idmodulo'];
$validaNumeroModulo     = m_valida::validaNumeros($id);
$verifiaModuloExistente = m_modulos::validaModuloExiste($id);
$validarLlavesForaneas  = m_modulos::verificarForaneas($id);

if ($validaNumeroModulo == 2) {
  echo "Error, El id del modulo debe ser tipo Numerico";
} elseif ($verifiaModuloExistente == 1) {
  echo "Error, El modulo que intenta eliminar no existe";
} elseif ($validarLlavesForaneas == 2) {
  echo "Error, Modulo esta referenciada en otras Tablas";
} elseif ($validaNumeroModulo == 1 and $verifiaModuloExistente == 2) {

  $mensaje = $m_consultas->eliminarCampo("modulos", "idmodulo", $id);
  echo $mensaje;
}
