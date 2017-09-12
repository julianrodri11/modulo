<?php

class m_modulos
{
  #funcion que sirve para insertar perfiles
  public function insertarModulo($modulo, $descripcion)
  {
    $modelo         = new Conexion();
    $conexion       = $modelo->get_conexion();
    $m_consultas    = new m_consultas();
    $verifcarmodulo = $m_consultas->get_campo("modulos", "modulo", "modulo", $modulo);
    if (strtolower($verifcarmodulo) == null) {
      #echo "puede registrar";
      $maxid     = $m_consultas->get_ultimovalor("modulos", "idmodulo");
      $sql       = "INSERT INTO modulos(idmodulo,modulo,descripcion) VALUES(:idmodulo,:modulo,:descripcion)";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':idmodulo', $maxid);
      $statement->bindParam(':modulo', $modulo);
      $statement->bindParam(':descripcion', $descripcion);
      if (!$statement) {
        return "2";
      } else {
        $statement->execute();
        return "1";
      }
    }
  }
  public function get_editarModulo($idmodulo)
  {
    //$rows      = null;
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT idmodulo, modulo, descripcion FROM modulos WHERE idmodulo=:modulo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':modulo', $idmodulo);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  public function buscarDatosModulo($arg_campos, $arg_tabla, $columna1, $columna2, $arg_valor1)
  {
    $m_valida   = new m_valida();
    $arg_valor1 = $m_valida->caracteres($arg_valor1);
    $arg_valor1 = $m_valida->remplazarcaracteresEspeciales($arg_valor1);

    $rows     = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT $arg_campos from $arg_tabla where $columna1 LIKE CONCAT('%','$arg_valor1','%') OR $columna2 LIKE  CONCAT('%','$arg_valor1','%')";

    $statement = $conexion->prepare($sql);
    //$statement->bindParam(":$arg_valor1", $arg_valor1);
    $statement->execute();
    $resultados = $statement->fetchAll();
    return $resultados;

  }

  public function validaModuloE($modulo)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT modulo FROM modulos WHERE modulo=:modulo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':modulo', $modulo);
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
  public function verificarForaneas($modulo)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";

 $sql       = "SELECT * from perfiles_modulos,opciones WHERE opciones.idopcion=:modulo or perfiles_modulos.idmodulo=:modulo";


    $statement = $conexion->prepare($sql);
    $statement->bindParam(':modulo', $modulo);
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

  public function validaModuloExiste($modulo)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    //$sql       = "SELECTidloginFROMloginWHEREcorreo                  = '$arg_valor1'";
    $sql       = "SELECT modulo FROM modulos WHERE idmodulo=:modulo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':modulo', $modulo);
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

  public function modificarModulo($columna1, $valor1, $idmodulo)
  {

    $modelo   = new Conexion();
    $conexion = $modelo->get_Conexion();
    $sql      = "UPDATE modulos SET $columna1 = :valor WHERE idmodulo = :idmodulo";

    $statement = $conexion->prepare($sql);
    $statement->bindParam(":valor", $valor1);
    $statement->bindParam(":idmodulo", $idmodulo);
    if (!$statement) {
      return "6";
    } else {
      $statement->execute();
      return "3";
    }

  }

}
