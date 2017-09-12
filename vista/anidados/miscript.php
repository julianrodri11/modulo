
<?php
require_once '../../Modelo/Conexion.php';
require_once '../../Modelo/m_login.php';
require_once '../../Modelo/m_valida.php';
require_once '../../Modelo/m_contrasenas.php';

$variable = $_POST['variable'];
$login    = new m_login();

$resul = $login->traerOpcionesCO($variable);

for ($i = 0; $i < count($resul); $i++) {

  echo "<option>" . $resul[$i][1] . "</option>";
}
?>