<?php

class m_opciones
{
  public function get_editarOpcion($idopcion)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT idopcion, nombre, ruta, descripcion FROM opciones WHERE idopcion=" . $idopcion;

    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  public function insertarOpcion($nombre, $descripcion, $ruta, $idmodulo)
  {
    $modelo      = new Conexion();
    $m_consultas = new m_consultas();
    $conexion    = $modelo->get_conexion();
    #echo "puede registrar";
    $maxid     = $m_consultas->get_ultimovalor("opciones", "idopcion");
    $sql       = "INSERT INTO opciones(idopcion,nombre,ruta,descripcion,idmodulo) VALUES(:idopcion,:opcion,:ruta,:descripcion,:idmodulo)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idopcion', $maxid);
    $statement->bindParam(':opcion', $nombre);
    $statement->bindParam(':ruta', $ruta);
    $statement->bindParam(':descripcion', $descripcion);
    $statement->bindParam(':idmodulo', $idmodulo);
    if (!$statement) {
      return "2";
    } else {
      $statement->execute();
      return "1";
    }
  }

  public function validaOpcionExiste($opcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT nombre FROM opciones WHERE idopcion=:opcion";
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
  public function validarExistenciaFuncionalidad($nombre, $idmodulo)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT * FROM opciones WHERE idmodulo=:idmodulo and nombre=:nombre";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idmodulo', $idmodulo);
    $statement->bindParam(':nombre', $nombre);
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
  public function verificarForaneas($opcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT * FROM perfiles_modulos WHERE idopcion=:opcion";
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

  public function insertarModuloOpcion($idperfil, $idmodulo, $idopcion)
  {
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    #echo "puede registrar";
    $sql       = "INSERT INTO perfiles_modulos(idperfil,idmodulo,idopcion) VALUES(:idperfil,:idmodulo,:idopcion)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':idperfil', $idperfil);
    $statement->bindParam(':idmodulo', $idmodulo);
    $statement->bindParam(':idopcion', $idopcion);
    if (!$statement) {
      return 2;
    } else {
      $statement->execute();
      return 1;
    }

  }

  public function buscarregistropcion($idperfil, $idmodulo, $idopcion)
  {
    $conexion  = new Conexion();
    $conexion  = $conexion->get_Conexion();
    $sql       = "SELECT * FROM perfiles_modulos WHERE idperfil=$idperfil AND idmodulo=$idmodulo AND idopcion=$idopcion";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetch();
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($resultados != '') {
      return 2;
    } else {

      return 1;
    }

  }

  public function buscarDatosOpciones($arg_campos, $arg_tabla, $columna1, $columna2, $columna3, $arg_valor1)
  {
    $m_valida   = new m_valida();
    $arg_valor1 = $m_valida->caracteres($arg_valor1);
    $arg_valor1 = $m_valida->remplazarcaracteresEspeciales($arg_valor1);

    $rows     = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT $arg_campos from $arg_tabla where $columna1 LIKE CONCAT('%','$arg_valor1','%') OR $columna2 LIKE  CONCAT('%','$arg_valor1','%') OR $columna3 LIKE  CONCAT('%','$arg_valor1','%')";



    $statement = $conexion->prepare($sql);
   // $statement->bindParam(":$arg_valor1", $arg_valor1);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

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

  public function validaOpcionE($opcion)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT nombre FROM opciones WHERE nombre=:opcion";
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

}
