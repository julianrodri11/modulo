<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RECUPERAR CONTRASEÑA</title>
  <?php include_once '../links.php';?>
</head>
<script type="text/javascript">

  function Enviar(){
    txt_correo = document.getElementById("txt_correo").value;
    jQuery.ajax({
        type: 'POST',
        url:'../../Controlador/c_recuperarcontrasena.php',
        async: true,
        data:{txt_correo:txt_correo},
        success:function(respuesta){
          $('.modal').modal();

           $('#resultado').html(respuesta);//no se la activa por que siempre muestra la respuesta
            $('#modal1').modal('open');


        },
        error: function () {
            alert("Error inesperado")
            window.top.location ="../index.html";
        }

    });

}


</script>

<body>

  <form method="post">
  <div class="container  teal lighten-5">

      <div class="container-fluid card-panel  teal lighten-2 center-align">
        <div class="row">
            <label style="color: #FFF;"><h5>RECUPERAR CONTRASEÑA</h5></label>
          </div>
      </div>
 <div class="container-fluid  center-align ">
      
        <a class="waves-effect waves-light btn-large" href="../index.php" style="width: 40%">Inicio</a>
      </div>
        <div class="container">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="txt_correo" type="email" data-length="10" >
            <label for="txt_correo">Correo</label>
          </div>
        </div>



          <div class="input-field col s12 m12 l12">
              <button class="btn waves-effect waves-light"  type="button" onclick="Enviar()" name="action">Enviar
                <i class="material-icons right">send</i>
              </button>
            </div>

        </div>
      </div>

  </form>


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mensaje</h4>
      <p id="resultado"></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Aceptar</a>
    </div>
  </div>

  <?php include_once '../footer.php';?>
</body>
</html>