<?php

class m_usuarios
{
  #funcion similar a modificarProducto()
  public function modificarUsuario($columna1, $valor1, $idusuarios)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_Conexion();
    $sql      = "UPDATE usuarios SET $columna1 = :valor WHERE idusuarios = :idusuarios";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":valor", $valor1);
    $statement->bindParam(":idusuarios", $idusuarios);
    if (!$statement) {
      return "6";
    } else {
      $statement->execute();
      return "3";
    }

  }
  public function insertarDatos($columna1, $columna2, $columna3, $columna4, $columna5, $columna6, $columna7,$id)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_Conexion();
    $sql      = "UPDATE usuarios SET tipoid=:columna1,numeroid=:columna2,nombre1=:columna3,nombre2=:columna4,apellido1=:columna5,apellido2=:columna6,fechanacimiento=:columna7 WHERE idlogin=:id";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":columna1", $columna1);
    $statement->bindParam(":columna2", $columna2);
    $statement->bindParam(":columna3", $columna3);
    $statement->bindParam(":columna4", $columna4);
    $statement->bindParam(":columna5", $columna5);
    $statement->bindParam(":columna6", $columna6);
    $statement->bindParam(":columna7", $columna7);
    $statement->bindParam(":id", $id);



    if (!$statement) {
      return "6";
    } else {
      $statement->execute();
      return "3";
    }

  }
  public function verificarForaneas($idlogin)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT * from login WHERE idlogin=:idlogin";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idlogin', $idlogin);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 2; //si el correo existe retorna 1
    } else {
      return 1;
      /*echo "Error, verifica tu usuario y contraseña";
      header('location:../index.php');*/
      //return 0; //si el correo no existe retorna 0

    }
  }

  public function traeridlogin($arg_valor1)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT idlogin FROM usuarios WHERE idusuarios=$arg_valor1";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetch();
    return $resultados['idlogin'];
  }

  public function validaUsuarioExiste($usuario)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT nombre1 FROM usuarios WHERE idusuarios=:usuario";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':usuario', $usuario);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 2; //si el correo existe retorna 1
    } else {
      return 1;
      /*echo "Error, verifica tu usuario y contraseña";
      header('location:../index.php');*/
      //return 0; //si el correo no existe retorna 0

    }
  }

  public function get_datos2($idusuarios)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT usuarios.apellido2,usuarios.apellido2,usuarios.fechanacimiento, usuarios.apellido1, usuarios.nombre2, usuarios.nombre1, usuarios.numeroid, perfiles.perfil, perfiles.idperfil FROM usuarios , perfiles WHERE usuarios.idperfil = perfiles.idperfil AND idusuarios=" . $idusuarios;

    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }
  public function get_datos3()
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT 
                  usuarios.apellido2,
                  usuarios.idusuarios, 
                  usuarios.fechanacimiento, 
                  usuarios.apellido1, 
                  usuarios.nombre2, 
                  usuarios.nombre1, 
                  usuarios.numeroid, 
                  perfiles.perfil, 
                  perfiles.idperfil
                  FROM usuarios 
                  INNER JOIN perfiles
                  ON usuarios.idperfil=perfiles.idperfil
                  ";

    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  #funcion similar a modificarProducto()
  public function modificarOpcion($columna1, $valor1, $idopcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_Conexion();
    $sql      = "UPDATE opciones SET $columna1 = :valor WHERE idopcion = :idopcion";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":valor", $valor1);
    $statement->bindParam(":idopcion", $idopcion);
    if (!$statement) {
      return "6";
    } else {
      $statement->execute();
      return "3";
    }

  }

  #funcion que sirve para buscar registros por dos campos cualquiera dentro de una tabla,ejemplo por nombre o cedula
  public function buscarDatosUsuario($arg_campos, $arg_tabla, $columna1, $columna2, $columna3,$columna4, $arg_valor1)
  {
    $m_valida   = new m_valida();
    $arg_valor1 = $m_valida->caracteres($arg_valor1);
    $arg_valor1 = $m_valida->remplazarcaracteresEspeciales($arg_valor1);

    $esnumero = is_numeric($arg_valor1);
    if ($esnumero == 1 and $arg_valor1 != '') {
      #echo "es numero";
      $var = "numeroid LIKE CONCAT('%',$arg_valor1,'%') OR ";
    } else {
      #echo "no es numero";
      $var = '';
    }
    $rows     = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT
    usuarios.apellido2,usuarios.idusuarios,usuarios.apellido2,usuarios.fechanacimiento, usuarios.apellido1, usuarios.nombre2, usuarios.nombre1, usuarios.numeroid, perfiles.perfil, perfiles.idperfil from usuarios
                  INNER JOIN perfiles
                  ON usuarios.idperfil=perfiles.idperfil where " . $var . " nombre1 LIKE CONCAT('%','$arg_valor1','%') OR
    nombre2 LIKE  CONCAT('%','$arg_valor1','%') OR apellido1 LIKE  CONCAT('%','$arg_valor1','%')  OR perfil LIKE  CONCAT('%','$arg_valor1','%')";

    $statement = $conexion->prepare($sql);
    //$statement->bindParam("arg_valor1", $arg_valor1);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  #funcion que sirve para insertar usuarios en la tabla usuarios
  public function insertarUsuario($arg_identificacion, $arg_nombre1, $arg_apellido1, $arg_correo,
    $arg_fechanacimiento) {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $id_correo = $modelo->get_idCorreo($arg_correo); #el correo debe llegar por la sesion del usuario
    $arg_id    = $modelo->get_ultimovalor("usuarios", "idusuarios");

    $idlogin   = $id_correo;
    $sql       = "INSERT INTO usuarios(idusuarios,numeroid,nombre1,apellido1,fechanacimiento,idlogin) VALUES(:idusuarios,:numeroid,:nombre1,:apellido1,:fechanacimiento,:idlogin)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idusuarios', $arg_id);
    $statement->bindParam(':numeroid', $arg_identificacion);
    $statement->bindParam(':nombre1', $arg_nombre1);
    $statement->bindParam(':apellido1', $arg_apellido1);
    $statement->bindParam(':fechanacimiento', $arg_fechanacimiento);
    $statement->bindParam(':idlogin', $idlogin);
    if (!$statement) {
      return "Error al ingresar el usuario";
    } else {
      $statement->execute();
      return "Usuario registrado correctamente";
    }

  }

}
//echo "Registro modificado exitosamente";
//echo "Error al modificar el registro";
