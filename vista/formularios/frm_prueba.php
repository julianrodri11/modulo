<?php
$conexion = new mysqli("localhost", "root", "", "sis_usuarios", 3306);

$strConsulta = "select idmodulo, modulo from modulos";
$result      = $conexion->query($strConsulta);
$opciones    = '<option value="0"> Elige una marca</option>';
while ($fila = $result->fetch_array()) {
  $opciones = '<option value="' . $fila["id"] . '">' . $fila["modulo"] . '</option>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Selects combinados JQuery + Ajax + PHP + MySQL</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#marca").change(function(){
          $.ajax({
            url:"c_prueba.php",
            type: "POST",
            data:"idmarca="+$("#marca").val(),
            success: function(opciones){
              $("#modelo").html(opciones);
            }
          })
        });
      });
    </script>
    </head>
    <body>
    <div> Selects combinados </div>
    <div> <label> Marca:</label> <select id="marca"><?php echo $opciones; ?></select>  </div>
    <div>
      <label> Modelo:</label>
      <select id="modelo">
        <option value="0">Elige un modelo</option>
      </select>
    </div>

    </body>
</html>
