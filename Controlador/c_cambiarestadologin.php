<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_login.php';
require_once '../Modelo/m_valida.php';
require_once '../Modelo/m_contrasenas.php';

$estado            = $_POST['estado'];
$correo            = $_POST['correo'];
$mensajeValidacion = null;

$m_login  = new m_login();
$m_valida = new m_valida();

$correo               = $m_valida->caracteres($correo);
$validaCorreoValido   = $m_valida->validaCorreo($correo);
$validarDatoExistente = $m_login->validarCorreoCambioestado($correo);

if (!isset($_POST['correo']) || empty($_POST['correo'])) {
  echo "Favor Ingresar Correo";
} elseif (!isset($_POST['estado']) || empty($_POST['estado'])) {
  echo "Error, Falta seleccionar el etado";
} elseif ($validaCorreoValido == 2) {
  echo "Error, Correo no Invalido, El correo debe estar de la siguiente manera, nombredecorre@example.com";
} elseif ($validarDatoExistente == 2) {
  echo "El Correo No existe Por favor verifiquelo";
} elseif ($validaCorreoValido == 1 and $validarDatoExistente == 1) {
  $mensaje = $m_login->cambiarEstado("estado", $estado, $correo);

  if ($mensaje == 1) {
    echo "El estado a sido cambiado Correctamente";
  }if ($mensaje == 2) {
    echo "Ocurrio un Error al cambiar el Estado";
  }
}
