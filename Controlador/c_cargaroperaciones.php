
<?php
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_login.php';

$variable = $_POST['variable'];
$resul    = m_login::traerOpcionesCO($variable);

for ($i = 0; $i < count($resul); $i++) {

  echo "<option value=" . $resul[$i][1] . ">" . $resul[$i][2] . "</option>";
}
?>