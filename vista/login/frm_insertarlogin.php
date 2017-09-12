
<!DOCTYPE doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <title>
        Formulario de registros de usuarios
      </title>
    </meta>
  </head>
  <body>
    <form action="../../Controlador/insertarlogin.controller.php" method="post">
      usuario
      <br/>
      <input name="txt_correo" type="email"/>
      <br/>
      Contraseña
      <br/>
      <input name="txt_contrasena" type="text"/>
      <br/>
      <input type="submit" value="Registrar Producto"/>
      <br/>
    </form>
    <a href="ver_usuarios.php">
      ver usuarios
    </a>
  </body>
</html>
