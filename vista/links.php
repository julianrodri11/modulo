<?php
/*VARIABLE QUE SACA EL NOMBRE DEL SERVIDOR*/
$servidor = $_SERVER['SERVER_NAME'];
/*VARIABLE QUE SACA EL NOMBRE DE LA CARPETA DEL PROYECTO QUE PUEDE SER CUALQUIERA*/

?>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href=<?php echo 'http://' . $servidor . '/modulo/vista/css/materialize.min.css' ?>  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href=<?php echo 'http://' . $servidor . '/modulo/vista/css/animate.css' ?>  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href=<?php echo 'http://' . $servidor . '/modulo/vista/css/personalizado.css' ?>  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href=<?php echo 'http://' . $servidor . '/modulo/vista/css/cambiosgenerales.css' ?>  media="screen,projection"/>      
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src=<?php echo 'http://' . $servidor . '/modulo/vista/js/jquery-2.1.1.min.js' ?> ></script>
      <script type="text/javascript" src=<?php echo 'http://' . $servidor . '/modulo/vista/js/materialize.min.js' ?>  ></script>

