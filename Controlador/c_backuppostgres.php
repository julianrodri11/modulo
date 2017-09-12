<?php 
/* Respalda una base de datos de postgresql en un archivo ASCII 
* Copyright GPL(C) 2003-2004 Manuel Montoya (wistar@biomedicas.unam.mx) 
* http://www.atenas.ath.cx/members/mmontoya/index.php?idp=48 
*/ 

//Fecha del backup 
$hoy=(date("d-M-Y")); 

//Nombre del archivo 
$name="centauro-". $hoy . "-backup"; 

//Extensi?n 
$RESPALDO=$name . ".sql"; 

// Limpio el cache 
/*header("Pragma: cache"); 

// Especifico el mime-type 
header("Content-type: text/plain;"); 
header("Content-Disposition: attachment; filename=".urlencode($name).".sql"); */

//Limpio el cabezal HTTP 
ob_start(); 

//archivo donde se guardan el nobre del usuario y de la BD 
//include("connexion.inc.php"); 
$user="postgres";
$db_name="sis_usuarios";

//Donde est? el pgdump? 
$pg_dump="C:\Program Files\PostgreSQL\9.5\bin"; 

//Comando 
$executa="$pg_dump\pg_dump.exe -h localhost -U postgres -p 5432 sis_usuarios > C:\Users\JULIAN\Downloads\\respaldo.sql"; 
//funciona en la consola 
//pg_dump.exe -h localhost -U postgres -p 5432 sis_usuarios > C:\Users\JULIAN\Downloads\respaldo.sql
//tambien colocandola en la consola funciona
//pg_dump.exe -h localhost -p 5432 -U postgres -F c -b -v -f "C:\Users\JULIAN\Downloads\respaldo.sql" sis_usuarios
//en consola extrae en formato sql
//pg_dump.exe -h localhost -p 5432 -U postgres -c -o -f "C:\Users\JULIAN\Downloads\respaldo.sql" sis_usuarios
//"$comando <b>r"; // s?lo lo pinto para pruebas 

system($executa, $resultado);
//exec($comando); 

//-- Lee el archivo y colocalo en el buffer 
//readfile ($RESPALDO); 
if ($resultado) { echo "<H1>Error ejecutando comando: $executa</H1>\n"; }

//-- Lo cierro pero no lo borro (s?lo para pruebas) 
//fclose($RESPALDO); 

//-- Borrar el archivo 
//unlink ($RESPALDO); 

//E voila!! 

?>"