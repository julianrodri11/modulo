<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Menu Principal</title>
  <?php require_once 'links.php';?>
</head>
<script type="text/javascript">
        $(document).ready(function()
        {
          $(".button-collapse").sideNav();
        });
      </script>
<body>

</body>
</html>


<?php

if (!isset($_SESSION["correo"])) {

  header('location:../index.php');

} else {
  $usuario = $_SESSION['correo'];?>
  <div class="navbar-fixed">
    <nav>
      <div class="container ">
      <div class="nav-wrapper  ">
        <a href="index.php" class="brand-logo"><i class="material-icons">business</i><?php echo $usuario; ?></a>

        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">

          <li><a href=<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/modulo/controlador/cerrar.php'; ?>>CERRAR SESIÓN</a></li>
          <li><a href="usuarios.php"><i class="material-icons left ">supervisor_account</i>Usuarios</a></li>
          <li><a href="menus.php"><i class="material-icons left ">done_all</i>Menus</a></li>
          <li><a href="opciones.php"><i class="material-icons left ">playlist_add</i>Opciones</a></li>
          <li><a href="auditoria.php"><i class="material-icons left ">visibility</i>Auditoria</a></li>
        </ul>
        <ul class="side-nav color" id="mobile-demo">
        <li><div class="userView">
          <img class="background">
          <a href="#!user"><img class="circle" ></a>
          <a href="#!name"><span class="white-text name">Usuario:</span></a>
          <a href="#!email"><span class="white-text email"><?php echo $usuario; ?></span></a>
        </div></li>
          <li><a href="sass.html">Perfiles</a></li>
          <li><a href="badges.html">Usuarios</a></li>
          <li><a href="collapsible.html">Menus</a></li>
          <li><a href="mobile.html">Opciones</a></li>
          <li><a href="mobile.html">Auditoria</a></li>
        </ul>
      </div>
      </div>
    </nav>
  </div>
    <?php }
?>



