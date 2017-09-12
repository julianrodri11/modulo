<?php

require_once 'Modelo/Conexion.php';
require_once 'Modelo/m_consultas.php';
require_once 'Controlador/c_cargar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Usuarios</title>
</head>
<body>
<h1>Listado de usuriaos</h1>

<form method="get">
	<input type="text" name="buscar"><br>
	<input type="submit" value="Buscar">
</form>

<?php
if (isset($_GET['buscar'])) 
	{
   		buscar($_GET['buscar']);
   	} else 
   	{
   		echo "<br>me debe listar todos los usuarios";
	}
cargar();
?>

<a href="frm_insertar.html">Nuevo Usuario</a>


</body>
</html>
