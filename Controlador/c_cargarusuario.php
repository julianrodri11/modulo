

  <link rel="stylesheet" href="../vista/css/styleTable.css">

<?php

function cargarUsuario()
{
  $consultas = new m_usuarios();
  $filas     = $consultas->get_datos3();

  ?>

        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
//abajo
  echo "<table>";
  echo "<tr>
            <th>IDENTIFICACIÓN</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>FECHA</th>
             <th>PERFIL</th>

            <th>Eliminar</th>
            <th>Actualizar</th>
         </tr>";

  foreach ($filas as $fila) {
    echo "<tr>";
    echo "<td>" . $fila['numeroid'] . "</td>";
    echo "<td>" . $fila['nombre1'] . "</td>";
    echo "<td>" . $fila['apellido1'] . "</td>";
    echo "<td>" . $fila['fechanacimiento'] . "</td>";
    echo "<td>" . $fila['perfil'] . "</td>";
    echo "<td><a href=../../Controlador/c_vistapreviaeliminarusuario.php?idusuario=" . $fila['idusuarios'] . "><i class='material-icons' center-align>delete_sweep</i></a></td>";
    echo "<td><a href=../../Controlador/c_listarusuarios.php?idusuario=" . $fila['idusuarios'] . "><i class='material-icons' center-align>create</i></a></td>";

    echo "</tr>";
  }
  echo "</table>";
  ?></div>
  </div><?php
}

function buscar($valor)
{
//ARRIBA
  (!empty($valor)) ? $valor : $valor = 0;
  $consultas                         = new m_usuarios();
  $filas                             = $consultas->buscarDatosUsuario("*", "usuarios", "numeroid", "nombre1", "apellido1", "perfil", $valor);
  ?>

        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
echo "<table>";
  echo "<tr>
            <th>IDENTIFICACIÓN</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>FECHA</th>
            <th>USUARIO</th>
            <th>Eliminar</th>
            <th>Actualizar</th>
         </tr>";
  if (isset($filas)) {
    foreach ($filas as $fila) {
      echo "<tr class=' teal darken-1'>";
      echo "<td class=' teal darken-1'>" . $fila['numeroid'] . "</td>";
      echo "<td class=' teal darken-1'>" . $fila['nombre1'] . "</td>";
      echo "<td class=' teal darken-1'>" . $fila['apellido1'] . "</td>";
      echo "<td class=' teal darken-1'>" . $fila['fechanacimiento'] . "</td>";
      echo "<td class=' teal darken-1'>" . $fila['perfil'] . "</td>";
      //echo "<td>" . $fila[4] . "</td>";
      echo "<td><a href=../../Controlador/c_vistapreviaeliminarusuario.php?idusuario=" . $fila['idusuarios'] . "><i class='material-icons' center-align>delete_sweep</i></a></td>";
      echo "<td><a href=../../Controlador/c_listarusuarios.php?idusuario=" . $fila['idusuarios'] . "><i class='material-icons' center-align>create</i></a></td>";

      echo "</tr>";
    }
    echo "</table>";

  }
  ?></div></div><?php
}

#funcion que sirve para sacar el maximo valor de una campo en una columna funciona ok
/*function cargar2()
{
$consultas = new Conexion();
$fila     = $consultas->get_ultimovalor("usuarios", "idusuarios");
foreach ($fila as $fila) {
echo "<td>" . $fila['MAX'] . "</td>";
}
}*/