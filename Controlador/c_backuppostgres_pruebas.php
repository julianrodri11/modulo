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
header("Pragma: no-cache"); 

// Especifico el mime-type 
//header("Content-type: text/plain;"); 
header("Expires: 0");
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=".$name.".sql"); 

//Limpio el cabezal HTTP 
//ob_start(); 

//archivo donde se guardan el nobre del usuario y de la BD 

$user="postgres";
$db_name="sis_usuarios";

//Donde est? el pgdump? 
$pg_dump="C:\Program Files\PostgreSQL\9.5\bin\pg_dump.exe"; 

//Comando 
$comando="$pg_dump -U postgres -W -F t $db_name > $RESPALDO"; 

//"$comando <b>r"; // s?lo lo pinto para pruebas 
exec($comando); 

//-- Lee el archivo y colocalo en el buffer 
readfile ($RESPALDO); 

//-- Lo cierro pero no lo borro (s?lo para pruebas) 
//fclose($RESPALDO); 

//-- Borrar el archivo 
unlink ($RESPALDO); 

//E voila!! 

?>"