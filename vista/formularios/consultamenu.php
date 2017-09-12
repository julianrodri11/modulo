<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activar/Desactivar Login</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
  });

   $(document).ready(function() {
    $('select').material_select();
  });

</script>
<body>

  <form method="post" action="../../Controlador/c_buscarmenu.php">
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>buscar menu</h5></label>
          </div>
      </div>

        <div class="container">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="input_text" type="text" data-length="10" name="txt_id">
            <label for="input_text">Correo</label>
          </div>
        </div>



          <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light"  type="submit" name="action">Cambiar Estado
                <i class="material-icons right">send</i>
              </button>
            </div>

        </div>
      </div>

  </form>

  <?php include_once '../footer.php';?>
</body>
</html>