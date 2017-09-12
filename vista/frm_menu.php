<?php
session_start();
require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';
require_once '../Modelo/m_consultas.php ';
require_once '../Modelo/m_login.php ';
include_once 'links.php';

$modeValida  = new m_valida();
$m_login     = new m_login();
$m_consultas = new m_consultas();
$correo      = $_SESSION['correo'];

$traerId = $m_consultas->get_idCorreo($correo);
$menu    = $m_login->buscarMenu($traerId[0][0]);

?><br>
<?php include_once 'menu.php';?>


<div class="container  teal lighten-10" >
  <br>
  <br>
  <br>
  <br>
  <br><br>
  <nav>
    <?php include_once 'menu.php';?>
    <div class="nav-wrapper">
      <form>
        <div class="input-field teal lighten-9" >
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  <nav>
    <div class="nav-wrapper">
     <a href="#" class="brand-logo right">Logo</a>
     <ul id="nav-mobile" class="left">
      <?php for ($i = 0; $i < count($menu); $i++) {
        echo "<li><a href='' class='collection-item'>" . $menu[$i][2] . "</a></li>";
      }?>

    </ul >
  </div >
</nav >



</div>
</div>
