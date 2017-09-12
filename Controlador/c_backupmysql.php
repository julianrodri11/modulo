<?php

//fijo el date de hoy
$date_month = date('m');
$date_year  = date('Y');
$date_day   = date('d');
$Date       = "$date_year-$date_month-$date_day";

//Archivo

//Datos BD
$usuario = "root";
$passwd  = "";
$bd      = "sis_usuarios";

$filename = "Backup_" . $bd . "_$Date.sql";

header("Pragma: no-cache");
header("Expires: 0");
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$filename");

// Utilización del script para windows o unix. Activar las lineas depende de cada caso

//windows
$executa = "C:\\xampp\mysql\bin\mysqldump.exe -u $usuario --password=$passwd --opt $bd";

system($executa, $resultado);

//para Unix
/*echo $executa = "mysqldump -u $usuario --password=$passwd --opt $bd";
echo system($executa, $resultado);
 */

if ($resultado) {echo "<H1>Error ejecutando comando: $executa</H1>\n";}
