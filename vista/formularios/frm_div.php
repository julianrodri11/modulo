<?php
//Esta sería la variable que recibiríamos del formulario ya sea por el método POST o GET
$texto = "cadena";
if (preg_replace("/\s+/"," ",$texto)) {
   echo "tiene";
 } else{
  echo "no tiene";
 }