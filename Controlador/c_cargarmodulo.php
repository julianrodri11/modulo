
  <link rel="stylesheet" href="../vista/css/styleTable.css">

<?php

function cargarModulo()
{
  $consultas = new m_consultas();
  $filas     = $consultas->get_datos("modulos", "*", '50');

  ?>

        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
//arriba
  echo "<table>";
  echo "<tr>
            <th>MÓDULO</th>
            <th>DESCRIPCIÓN</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
         </tr>";

  foreach ($filas as $fila) {

    echo "<tr>";
    echo "<td>" . $fila['modulo'] . "</td>";
    echo "<td>" . $fila['descripcion'] . "</td>";
    //echo "<td>" . $fila['correo'] . "</td>";

    echo "<td><a href=../../Controlador/c_vistaeliminarmodulo.php?idmodulo=" . $fila['idmodulo'] . "><i class='material-icons' center-align>delete_sweep</i></a></td>";
    echo "<td><a href=../../Controlador/c_editarmodulo.php?idmodulo=" . $fila['idmodulo'] . "><i class='material-icons' center-align>create</i></a></td>";

    echo "</tr>";
  }
  echo "</table>";
  ?></div></div><?php
}

function buscar($valor)
{
  (!empty($valor)) ? $valor : $valor = 0;
  $consultas                         = new m_modulos();
  $filas                             = $consultas->buscarDatosModulo("*", "modulos", "modulo", "descripcion", $valor);
  ?>

        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
echo "<table>";
  echo "<tr>
            <th>MÓDULO</th>
            <th>DESCRIPCIÓN</th>
             <th>Eliminar</th>
            <th>Actualizar</th>

         </tr>";
  if (isset($filas)) {
    foreach ($filas as $fila) {
      echo "<tr class=' teal darken-1'>";
      echo "<td class=' teal darken-1'>" . $fila['modulo'] . "</td>";
      echo "<td class=' teal darken-1'>" . $fila['descripcion'] . "</td>";

      //echo "<td>" . $fila[4] . "</td>";
     echo "<td><a href=../../Controlador/c_vistaeliminarmodulo.php?idmodulo=" . $fila['idmodulo'] . "><i class='material-icons' center-align>delete_sweep</i></a></td>";
    echo "<td><a href=../../Controlador/c_editarmodulo.php?idmodulo=" . $fila['idmodulo'] . "><i class='material-icons' center-align>create</i></a></td>";

      echo "</tr>";
    }
    echo "</table>";

  } ?></div></div><?php
}

#funcion que sirve para sacar el maximo valor de una campo en una columna funciona ok
/*function cargar2()
{
$consultas = new Conexion();
$filas     = $consultas->get_ultimovalor("usuarios", "idusuarios");
foreach ($filas as $fila) {
echo "<td>" . $fila['MAX'] . "</td>";
}
}*/
