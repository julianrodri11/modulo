<?php
if (isset($_POST["idmarca"])) {
  $opciones = '<option value="0"> Elige un modelo</option>';

  $conexion    = new mysqli("localhost", "root", "", "sis_usuarios", 3306);
  $strConsulta = "select idopcion, nombre from opciones where idopciones = " . $_POST["idmarca"];
  $result      = $conexion->query($strConsulta);

  while ($fila = $result->fetch_array()) {
    $opciones .= '<option value="' . $fila["idopcion"] . '">' . $fila["nombre"] . '</option>';
  }

  echo $opciones;
}
