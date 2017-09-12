<?php
/*
 *
 * CREA UN ARCHIVO PARA LA CONEXION DEL MODULO EN LA RUTA DE LA LINEA CON LA FUNCIÓN  fopen
 *
 */
$motor  = "pgsql";//$_POST['txt_motor'];
$user   = $_POST['txt_usuario'];
$pass   = $_POST['txt_contrasena'];
$host   = $_POST['txt_host'];
$bd     = $_POST['txt_bd'];
$port   = $_POST['txt_puerto'];
//$backup = $_FILES["archivos"];
$user_adm=$_POST['txt_usuario_adm'];
$pass_adm=$_POST['txt_contrasena_adm'];
$pass_adm=sha1($pass_adm);
/*SE CREA UN ARCHIVO CON PARAMETROS DE ESCRITURA (W) */
$file = fopen("../Modelo/Conexion.php", "w");

/*SE CREA UNA CADENA CON LOS PARAMETROS DEL USUARIO PARA GENERERAR LA CONEXION*/
$texto = "<?php class Conexion
{
  public function get_Conexion()
  {
    \$motor = \"$motor\";
    \$user  = \"$user\";
    \$pass  = \"$pass\";
    \$host  = \"$host\";
    \$db    = \"$bd\";
    \$port    = \"$port\";
    try {
      \$conexion = new PDO(\"\$motor:host = \$host;port=\$port;dbname=\$db;\", \$user, \$pass);
      \$conexion->query(\"SET NAMES 'utf8'\");
      \$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return \$conexion;
    } catch (PDOException \$e) {
      echo 'Falló la conexión: ' . \$e->getMessage();
    }

  }

  public function cerrar_Conexion()
  {
    self::\$conexion = null;
  }

} ?>";
/*SE ESCRIBE EL ARCHIVO Conexion.php CON LOS PARAMETROS*/
fwrite($file, $texto . PHP_EOL);

//SE CIERRA EL ARCHIVO DESPUES DE ESCRIBIR LA INFORMACIÓN
fclose($file);

/*
 *
 *CREACION DEL SCRIPT DE LA BASE DE DATOS A PARTIR DE UNA COPIA(SCRIPT SQL)
 *
 */


/*
 *PARA SUBIR EL ARCHIVO AL SERVIDROR Y A PARTIR DE ESA COPIA REALIZAR LA INSERCIÓN
 *
 */


/*
*
* INSERTANDO USUARIO ADMMINISTRADOR EN LA BASE DE DATOS
 */
include_once('../Modelo/Conexion.php');
$modelo = new Conexion();
$conexion=$modelo->get_conexion();

$sql = "INSERT INTO login (idlogin, correo, contrasena, estado) VALUES (1, :correo, :contrasena, 'ACTIVO');";
//$sql = "INSERT INTO usuarios (idusuarios,idlogin,idperfil) VALUES (1,1,1);";
$statement = $conexion->prepare($sql);    
$statement->bindParam(':correo', $user_adm);
$statement->bindParam(':contrasena', $pass_adm);  

$sql2 = "INSERT INTO usuarios (idusuarios,idlogin,idperfil) VALUES (1, 1, 1);";
//$sql = "INSERT INTO usuarios (idusuarios,idlogin,idperfil) VALUES (1,1,1);";
$statement2 = $conexion->prepare($sql2);    

    //$statement->execute();
if (!$statement) {
     // return "2"; //SINO TUVO EXITO LA INSERCION DEL TOKEN ENTONCES RETORNA 2 PARA ERROR EN EL CONTROLADOR
 echo "<br>Error, no se ha podido insertar el usuario administrador en la base de datos";
} else {
  $statement->execute();
  $statement2->execute();
    //  return "1"; //SI SE INSERTO ENTONCES RETORNA 1
  echo "<br>El usuario administrador se ha creado correctamente<br><a href='../index.php'>Ir al modulo</a>";
  
}



