<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';

  $m_consultas = new m_consultas();
$id = $_POST['idopcion'];

$validaNumeroOpcion     = m_valida::validaNumeros($id);
$verifiaOpcionExistente = m_opciones::validaOpcionExiste($id);
$validarLlavesForaneas  = m_opciones::verificarForaneas($id);

if ($validaNumeroOpcion == 2) {
  echo "Error, El id de la opcion debe ser tipo Numerico";
} elseif ($verifiaOpcionExistente == 1) {
  echo "Error, La opcion que intenta eliminar no existe";
} elseif ($validarLlavesForaneas == 2) {
  echo "Error, Modulo esta referenciada en otras Tablas";
} elseif ($validaNumeroOpcion == 1 and $verifiaOpcionExistente == 2 and $validarLlavesForaneas == 1) {


  $mensaje     = $m_consultas->eliminarCampo("opciones", "idopcion", $id);
  echo $mensaje;
}
