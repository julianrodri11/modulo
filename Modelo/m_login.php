<?php

class m_login
{
  #funcion que sirve para insertar login
  public function insertarLogin($correo, $contrasena)
  {
    $contrasena     = sha1($contrasena);
    $modeloc        = new Conexion();
    $conexion       = $modeloc->get_conexion();
    $m_consultas    = new m_consultas();
    $verifcarcorreo = $m_consultas->get_campo("login", "correo", "correo", $correo);
    if (strtolower($verifcarcorreo) == null) {
      //echo "puede registrar";
      $maxid     = $m_consultas->get_ultimovalor("login", "idlogin");
      $sql       = "INSERT INTO login(idlogin,correo,contrasena) VALUES(:idlogin,:correo,:contrasena)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':idlogin', $maxid);
      $statement->bindParam(':correo', $correo);
      $statement->bindParam(':contrasena', $contrasena);
      if (!$statement) {
        return "2";
      } else {
        $statement->execute();
        return "1";
      }
    } else {
      return "3";
    }
  }
  public function insertarUsuarioLogin($idlogin, $idperfil)
  {
    $modeloc        = new Conexion();
    $conexion       = $modeloc->get_conexion();
    $m_consultas    = new m_consultas();
    
      $maxid     = $m_consultas->get_ultimovalor("usuarios", "idusuarios");
      $sql       = "INSERT INTO usuarios(idusuarios,idlogin,idperfil) VALUES(:idusuarios,:idlogin,:idperfil)";

      $statement = $conexion->prepare($sql);
      $statement->bindParam(':idusuarios', $maxid);
      $statement->bindParam(':idlogin', $idlogin);
      $statement->bindParam(':idperfil', $idperfil);
      if (!$statement) {
        return "2";
      } else {
        $statement->execute();
        return "1";
      }
    
  }

  public function get_datoslogin($limit)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT login.idlogin, login.correo, login.estado, usuarios.nombre1, usuarios.nombre2, usuarios.numeroid
FROM login
LEFT JOIN usuarios ON login.idlogin = usuarios.idlogin";

    $statement = $conexion->prepare($sql);
    //$statement->bindParam(":$arg_tabla", $arg_tabla);
    //$statement->bindParam(":$arg_campos", $arg_campos);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;
    /*while ($resultados = $statement->fetch())
  {   $rows[] = $resultados;   }
  return $rows;*/
  }

  public function buscarDatosLogin($arg_valor1)
  {
    $m_valida   = new m_valida();
    $arg_valor1 = $m_valida->caracteres($arg_valor1);
    $arg_valor1 = $m_valida->remplazarcaracteresEspeciales($arg_valor1);

    $esnumero = is_numeric($arg_valor1);
    //valida si es número
    if ($esnumero == 1 and $arg_valor1 != '') {
      #echo "es numero";
      $var = "us.numeroid LIKE CONCAT('%',$arg_valor1,'%') OR ";
    } else {
      #echo "no es numero";
      $var = '';
    }
    //$rows     = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "SELECT us.idusuarios, us.numeroid, us.nombre1, us.apellido1, l.correo, l.estado FROM  usuarios us INNER JOIN login l ON us.idlogin = l.idlogin WHERE
    " . $var . " us.nombre1 LIKE CONCAT('%','$arg_valor1','%') or us.apellido1  LIKE CONCAT('%','$arg_valor1','%') or l.correo LIKE CONCAT('%','$arg_valor1','%') or l.estado = '$arg_valor1';";
    //echo "$sql";

    $statement = $conexion->prepare($sql);
    //$statement->bindParam(":$arg_valor1", $arg_valor1);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;
  }

  public function get_editarLogin($idlogin)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT idlogin, correo, estado FROM login WHERE idlogin=" . $idlogin;

    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  public function desactivarLogin()
  {
    $row      = null;
    $modelo   = new Conexion();
    $Conexion = $modelo->get_Conexion();
    $sql      = "select * from productos";

  }

  public function cambiarEstado($campo, $estado, $correo)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "UPDATE login SET $campo = :estado WHERE login.correo = :correo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(":estado", $estado);
    $statement->bindParam(":correo", $correo);
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if (!$statement) {
      return 2;
    } else {
      $statement->execute();
      return 1;
    }

  }

  public function iniciarsesionLogin($correo, $contrasena)
  {
    $rows       = null;
    $contrasena = sha1($contrasena);
    $modelo     = new Conexion();
    $conexion   = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql = "SELECT login.correo, login.contrasena, login.estado, login.idlogin
FROM login
          WHERE correo = :correo and contrasena = :contrasena and estado = 'ACTIVO'";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':correo', $correo);
    $statement->bindParam(':contrasena', $contrasena);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {

      $_SESSION['estado']  = $resultados['estado'];
      $_SESSION['usuario'] = $resultados['correo'];

      return 1; //si encontro valores, los retorna
    } else {
      return 2;
    }
  }

  public function verificaDatodPersonales($id)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT * FROM usuarios WHERE tipoid is NULL and numeroid is NULL and nombre1 is NULL and apellido1 is NULL and idlogin=:id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $resultados = $statement->fetch();

    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados=='') {
      return 1; //si el correo existe retorna 1
    } else {
      return 2;
    }
  }

  public function validarRoor($id)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT * FROM usuarios WHERE idlogin=:id and idperfil=1";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 1;
    } else {
      return 2;
    }
  }

  public function validarCorreo($correo)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT correo FROM login WHERE correo=:correo and estado='ACTIVO'";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':correo', $correo);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 1;
    } else {
      return 2;
    }
  }

  public function validarCorreoExistente($correo)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT correo FROM login WHERE correo=:correo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':correo', $correo);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 2;
    } else {
      return 1;
    }
  }
  public function validarActualizarDatos($idlogin)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT idusuarios FROM usuarios WHERE idlogin=:idlogin";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 1; //si el correo existe retorna 1
    } else {
      return 2;
    }
  }

  public function validarCorreoCambioestado($correo)
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT correo FROM login WHERE correo=:correo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':correo', $correo);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 1; //si el correo existe retorna 1
    } else {
      return 2;
    }
  }

  public function recuperarContrasena($correo)
  {
    $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());
    date_default_timezone_set("America/Bogota");
    //$time = time();
    //$fechavencimiento =date("Dd - Mm - YH:i:s:A", $time);
    //$date1 = new DateTime("2017 - 07 - 1715:29:00");
    $fechasolicitudtoken = date("Y/m/d h:i:s", time());
    $para                = $correo;
    $titulo              = 'Recuperación de contraseña';
    $mensaje             = 'Hola ' . $correo . "\r\n" . 'Estás recibiendo este mensaje porque solicitaste restablecer la contraseña en nuestro sistema.' . "\r\n \r\n" . 'Para cambiar tu contraseña haz clic en el siguiente enlace:' . "\r\n" . ' http://localhost/modulo/Controlador/c_verificartoken.php?var=' . $token . "\r\n \r\n" . 'Tu correo electrónico registrado en nuestra plataforma es: ' . $correo . "\r\n" . ' * Si no es tu intención restablecer  tu clave puedes ignorar este mensaje.';
    $cabeceras           = 'From: ' . $para . '' . "\r\n" .
    'Reply-To: ' . $para . '' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($para, $titulo, $mensaje, $cabeceras);
    $modelo      = new Conexion();
    $m_consultas = new m_consultas();
    $conexion    = $modelo->get_conexion();
    //$sql       = "SELECTcorreo, contrasena, estadoFROMloginWHEREcorreo = :correo and contrasena = :contrasena and estado = 'ACTIVO'";
    $maxid     = $m_consultas->get_ultimovalor("contrasenas", "idcontrasenas");
    $sql       = "INSERT INTO contrasenas(idcontrasenas,correo,token,fechavencimientotoken)VALUES(:idcontrasenas,:correo, :token, :fechavencimientotoken);";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idcontrasenas', $maxid);
    $statement->bindParam(':correo', $correo);
    $statement->bindParam(':token', $token);
    $statement->bindParam(':fechavencimientotoken', $fechasolicitudtoken);
    //$statement->execute();
    if (!$statement) {
      return "2"; //SINO TUVO EXITO LA INSERCION DEL TOKEN ENTONCES RETORNA 2 PARA ERROR EN EL CONTROLADOR
    } else {
      $statement->execute();
      return "1"; //SI SE INSERTO ENTONCES RETORNA 1
    }
  }

  public function verificartoken($token)
  {
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    #COMPARAR LA FECHA EN QUE HACE CLICK EN EL TOQUEN,CON LA FECHA EN QUE SE GENERO
    $sql       = "SELECT correo, token, fechavencimientotoken from contrasenas WHERE token=:token";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':token', $token);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL EXISTE EL TOKEN Y ES DIFERENTE DE VACIO
    if ($resultados != '') {

      $fechasolicitudtoken = $resultados['fechavencimientotoken'];
      $correo              = $resultados['correo'];
      date_default_timezone_set("America/Bogota");
      $fechaactual = date('Y/m/d h:i:s');
      $segundos    = (strtotime($fechaactual) - strtotime($fechasolicitudtoken));
      $segundos    = abs($segundos);
      $segundos    = floor($segundos);
      //echo $segundos;
      $minutos = $segundos / 60;
      //echo "Minutos: " . $minutos;
      $horas = $minutos / 60;
      //echo "Horas: " . $horas;
      $dias = $horas / 24;
      //echo "Dias: " . $dias;
      if ($dias >= 1) {
        return "ERRORTOKENVENCIDO";
      } else {
        //echo "Actualizar contraseña sql";
        header('location:../vista/formularios/frm_cambiarcontra.php?correo=' . $correo);
      }
    } else {
      return "TOKENNOEXISTE";
    }
  }

  public function traerPerfiles()
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "SELECT idperfil, perfil from perfiles";

    $statement = $conexion->prepare($sql);

    $statement->execute();
    $count     = $statement->rowCount();
    $registroP = $statement->fetchAll();

    if ($count == 0) {
      return 2;
    } else {

      return $registroP;
    }
  }

  public function traerModulos()
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "SELECT idmodulo, modulo from modulos";

    $statement = $conexion->prepare($sql);

    $statement->execute();
    $count     = $statement->rowCount();
    $registroM = $statement->fetchAll();

    if ($count == 0) {
      return 2;
    } else {

      return $registroM;
    }
  }

  public function traerOpcionesCO($idselect)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "SELECT opciones.idmodulo,opciones.idopcion, opciones.nombre, modulos.modulo
FROM opciones , modulos WHERE modulos.idmodulo=:idselect AND opciones.idmodulo=:idselect";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":idselect", $idselect);

    $statement->execute();
    $count     = $statement->rowCount();
    $registroO = $statement->fetchAll();

    if ($count == 0) {
      return 2;
    } else {

      return $registroO;
    }
  }

  public function buscarMenu($id)
  {
    //echo "---".$id;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "SELECT perfiles.perfil, modulos.modulo, opciones.nombre, opciones.ruta, usuarios.nombre1, usuarios.apellido2
    FROM opciones
    LEFT JOIN perfiles_modulos ON opciones.idopcion = perfiles_modulos.idopcion
    LEFT JOIN modulos ON perfiles_modulos.idmodulo  = modulos.idmodulo
    LEFT JOIN perfiles ON perfiles_modulos.idperfil = perfiles.idperfil
    LEFT JOIN usuarios ON perfiles.idperfil         = usuarios.idperfil WHERE usuarios.idlogin=:id";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->execute();
    $count    = $statement->rowCount();
    $registro = $statement->fetchAll();

    if ($count == 0) {
      return 2;
    } else {

      return $registro;
    }
  }

  /*public function intentos($ses_alm)
{
$intento = 0;
if ($intento >= 3 and $_SESSION['$ses_alm'] == $_SERVER['REMOTE_ADDR']) {
$_SESSION['intentos'] = $intento;
unset($_SESSION['intentos']);
//      header('location:../error.php');
$_SESSION['intentos'] = $intento;
} else {
$intento++;
$_SESSION['intentos'] = $intento;
return $_SESSION['intentos'];

}
}*/

}
