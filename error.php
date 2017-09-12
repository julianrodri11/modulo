<html> 
<head> 
    <title>Fondo de prueba</title> 
    <?php include_once 'vista/links.php'; ?>
<style type="text/css">
  html {
    line-height: 1.5;
    font-family: "Roboto", sans-serif;
    font-weight: normal;
    color: rgb(255, 255, 255);
}
  #mensaje{

   
     margin-top: -44%;
    margin-left: 38%;
    font-size: 193%;
}
  


</style>
</head> 


<body> 
<div>
   <img src="ipbloqueada.jpg" width="100%" height="100%" />


</table> 

</body> 
</html>

<?php
session_start();


 $fechaGuardada = $_SESSION['hora'];
echo  "<br>";
 $ahora          = date("Y-n-j H:i:s");
$tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
 "<br>";
 ?>
  <div id="wallper" >
 <div id="mensaje" >

<?php

$tiempo_transcurrido=30-$tiempo_transcurrido;
$tiempo_transcurrido=$tiempo_transcurrido;
echo "POR FAVOR  INGRESE NUEVAMENTE EN  ";
echo  $tiempo_transcurrido." SEGUNDOS";
echo "<br>";
echo "<br>"; ?>
   <div class="input-field col s12 m12 l12">
              <a class="btn waves-effect waves-light" href="" >ACTUALIZAR
              
              </a>
            </div>
<?php
if ($tiempo_transcurrido >=0) {
} else {
  echo "ahora si";
  $_SESSION['estado'] = "ACTIVO";
  session_destroy();
  header('location:index.php');
}
?>

</div>
 </div>



