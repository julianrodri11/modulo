<?php

$fecha1 = Date("2017-08-20 08:46:00");

date_default_timezone_set("America/Bogota");
$fecha2 = date('Y/m/d h:i:s');
echo $fecha1;
?><br><?php
echo $fecha2;

$segundos = (strtotime($fecha2) - strtotime($fecha1));
$segundos = abs($segundos);
$segundos = floor($segundos);
?><br><?php
echo $segundos;
?><br><?php
$minutos = $segundos / 60;
echo "Minutos: " . $minutos;
?><br><?php
$horas = $minutos / 60;
echo "Horas: " . $horas;
?><br><?php
$dias = $horas / 24;
echo "Dias: " . $dias;


echo "----------------------<br>COMPARA LAS ZONAS DE HORARIOS Y VERIFICA QUE NO TENGA ERROR";

date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini.';
} else {
    echo 'La zona horaria del script y la zona horaria de la configuración ini coinciden.';
}

