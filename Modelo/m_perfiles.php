<?php

class m_perfiles
{
  #funcion que sirve para insertar perfiles
  public function insertarPerfil($perfil, $descripcion)
  {
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $modeloc  = new m_consultas();

    //echo "puede registrar";
    $maxid     = $modeloc->get_ultimovalor("perfiles", "idperfil");
    $sql       = "INSERT INTO perfiles(idperfil,perfil,descripcion) VALUES(:idperfil,:perfil,:descripcion)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idperfil', $maxid);
    $statement->bindParam(':perfil', $perfil);
    $statement->bindParam(':descripcion', $descripcion);
    if (!$statement) {
      return "2";
    } else {
      $statement->execute();
      return "1";
    }

  }
  public function buscarDatosPerfil($arg_campos, $arg_tabla, $columna1, $columna2, $arg_valor1)
  {
    $m_valida   = new m_valida();
    $arg_valor1 = $m_valida->caracteres($arg_valor1);
    $arg_valor1 = $m_valida->remplazarcaracteresEspeciales($arg_valor1);

    //$rows     = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT $arg_campos from $arg_tabla where $columna1 LIKE CONCAT('%','$arg_valor1','%') OR $columna2 LIKE  CONCAT('%','$arg_valor1','%')";

    $statement = $conexion->prepare($sql);
    //$statement->bindParam(":$arg_valor1", $arg_valor1);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }
  public function validaPerfilExiste($opcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT perfil FROM perfiles WHERE idperfil=:opcion";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':opcion', $opcion);
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

  public function verificarForaneas($perfiles)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT * from perfiles_modulos,usuarios WHERE usuarios.idperfil=:perfiles or perfiles_modulos.idperfil=:perfiles";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':perfiles', $perfiles);
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

  public function modificarPerfil($columna1, $valor1, $idperfil)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_Conexion();
    $sql      = "UPDATE perfiles SET $columna1 = :valor WHERE idperfil = :idperfil";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":valor", $valor1);
    $statement->bindParam(":idperfil", $idperfil);
    if (!$statement) {
      return "6";
    } else {
      $statement->execute();
      return "3";
    }

  }

  public function get_editarPerfil($idperfil)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT idperfil, perfil, descripcion FROM perfiles WHERE idperfil=" . $idperfil;

    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  public function validaperfilE($perfil)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT perfil FROM perfiles WHERE perfil=:perfil";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':perfil', $perfil);
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

  public function insertarUsuario($selectPerfil, $selectModulo, $SelectOpcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();

    $sql = "INSERT INTO perfiles_modulos(idperfil, idmodulo, idopcion) VALUES (:selectPerfil,:selectModulo,:SelectOpcion)";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(':selectPerfil', $selectPerfil);
    $statement->bindParam(':selectModulo', $selectModulo);
    $statement->bindParam(':SelectOpcion', $SelectOpcion);

    $statement->execute();

    if (!$statement) {
      return "6";
    } else {

      return "3";
    }

  }

}
