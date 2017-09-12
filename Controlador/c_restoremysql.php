<?php

//Datos BD
$usuario = "root";
$passwd = "";
//$bd = "sis_usuarios";

$directorio = "C:\\Users\JULIAN\Downloads\Backup_sis_usuarios_2017-08-31.sql";

//windows
$executa = "C:\\xampp\mysql\bin\mysql.exe -u $usuario --password=$passwd borrar < $directorio";

$respuesta=system($executa, $resultado);
if ($resultado) { echo "<H1>Error ejecutando comando: $executa</H1>\n"; }else{
	echo "La base de datos se ha creado correctamente";
}

?>
