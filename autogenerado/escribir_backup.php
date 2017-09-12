<?php
/*
 *
 * CREA UN ARCHIVO PARA LA CONEXION DEL MODULO EN LA RUTA DE LA LINEA CON LA FUNCIÓN  fopen
 *
 */
$motor  = $_POST['txt_motor'];
$user   = $_POST['txt_usuario'];
$pass   = $_POST['txt_contrasena'];
$host   = $_POST['txt_host'];
$bd     = $_POST['txt_bd'];
$port   = $_POST['txt_puerto'];
$backup = $_FILES["archivos"];
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

try {
  $conexion = new PDO("$motor:host = $host;port=$port", $user, $pass);
  $conexion->query("SET NAMES 'utf8';");
  $conexion->query("CREATE DATABASE IF NOT EXISTS $bd DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci");
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Falló la conexión: ' . $e->getMessage();
}
/*
 *PARA SUBIR EL ARCHIVO AL SERVIDROR Y A PARTIR DE ESA COPIA REALIZAR LA INSERCIÓN
 *
 */

$ruta_tmp = $_FILES['archivos']['tmp_name'];
$nombre   = $_FILES['archivos']['name'];
$tipo     = $_FILES['archivos']['type'];
$tamano   = $_FILES['archivos']['size'];
move_uploaded_file($ruta_tmp, './' . $nombre);

//url donde esta ubicada la copia a restaurar
//$directorio = "C:\\Users\JULIAN\Downloads\Backup_sis_usuarios_2017-08-31.sql";
$directorio = "./" . $nombre;

//Comando para restaurar la copia de seguridad en la base de datos borrar
$executa = "C:\\xampp\mysql\bin\mysql.exe -u $user --password=$pass $bd < $directorio";

$respuesta = system($executa, $resultado);
if ($resultado) {echo "<H1>Error ejecutando comando: $executa</H1>\n";} else {
  echo "<H1>La base de datos se ha creado correctamente<H1><br><a href='../index.php'>Ir al modulo</a>";
}

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
    
    //$statement->execute();
    if (!$statement) {
     // return "2"; //SINO TUVO EXITO LA INSERCION DEL TOKEN ENTONCES RETORNA 2 PARA ERROR EN EL CONTROLADOR
     echo "<br>Error, no se ha podido insertar el usuario administrador en la base de datos";
    } else {
      $statement->execute();
    //  return "1"; //SI SE INSERTO ENTONCES RETORNA 1
      echo "<br>El usuario administrador se ha creado correctamente";
    }

