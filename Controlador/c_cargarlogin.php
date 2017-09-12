<?php


function cargarLogin()
{
  $m_login = new m_login();
  $fila    = $m_login->get_datoslogin('50');

  ?>
  
        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
//arriba
  echo "<table>";

  echo "<thead><tr>
            <th>IDENTIFICACIÓN </th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CORREO</th>
            <th>ESTADO</th>
            <th>Eliminar</th>
            <th>actualizar</th>

         </tr></thead>";

  foreach ($fila as $fila) {

    echo "<tr>";
    echo "<td>" . $fila['numeroid'] . "</td>";
    echo "<td>" . $fila['nombre1'] . "</td>";
    echo "<td>" . $fila['nombre2'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>" . $fila['estado'] . "</td>";

    //echo "<td>" . $fila['correo'] . "</td>";

    echo "<td><a style='left: 30dp' href=../../Controlador/c_vistapreviaeliminarlogin.php?idlogin=" . $fila['idlogin'] . "><i class='material-icons' center-align>delete_sweep</i></a></td>";
    echo "<td><a href=../../Controlador/c_editarlogin.php?idlogin=" . $fila['idlogin'] . "><i class='material-icons' center-align>create</i></a></a></td>";

    echo "</tr>";
  }
  echo "</table>";
  ?></div></div><?php
}

function buscar($valor)
{
  (!empty($valor)) ? $valor : $valor = 0;

  $m_login = new m_login();
  $fila    = $m_login->buscarDatosLogin($valor);
  ?>

        <div class="row">
          <div class="input-field col s12 m12 l12">
<?php
echo "<table>";
  echo "<tr>
            <th>IDENTIFICACIÓN </th>
            <th>NOMBRE</th>
             <th>APELLIDO</th>
            <th>CORREO</th>
            <th>ESTADO</th>
             <th>Eliminar</th>
            <th>actualizar</th>

         </tr>";

  for ($i = 0; $i < count($fila); $i++) {

    echo "<tr class=' teal darken-1'>";
    echo "<td class=' teal darken-1'>" . $fila[$i][1] . "</td>";
    echo "<td class=' teal darken-1'>" . $fila[$i][2] . "</td>";
    echo "<td class=' teal darken-1'>" . $fila[$i][3] . "</td>";
    echo "<td class=' teal darken-1'>" . $fila[$i][4] . "</td>";
    echo "<td class=' teal darken-1'>" . $fila[$i][5] . "</td>";
    echo "<td><a href=../../Controlador/c_vistapreviaeliminarlogin.php?idlogin=" . $fila[$i][0] . ">eliminar</a></td>";
    echo "<td><a href=../../Controlador/c_editarlogin.php?idlogin=" . $fila[$i][0] . ">Actualizar</a></td>";

    echo "</tr>";}
  echo "</table>";

  ?></div></div><?php
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
