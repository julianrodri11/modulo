<?php

/**
 *
 */
class m_consultas
{
  #funcion que sirve para obtener el id de un correo
  #ESTA FUNCION NO SE ESTA USANDO, ES LA MISMA QUE ESTA EN  CONEXION.PHP

  public function get_datos($arg_tabla, $arg_campos, $limit)
  {
    //$rows      = null;
    $modelo   = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql      = "SELECT $arg_campos FROM $arg_tabla LIMIT $limit";

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

  #obtener el utlimo valor de una calumna de cualquier tabla
  #se esta usando en insertar correo y insertar usuarios
  public function get_ultimovalor($tabla, $vercolumna1)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT MAX($vercolumna1)+1 as max FROM $tabla";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultado = $statement->fetch(PDO::FETCH_ASSOC);
    $maxid     = $resultado['max'];
    if (strtolower($maxid) == null or strlen($maxid) < 0) {
      $maxid = 1;
      return $maxid;
    } else {
      return $resultado['max'];
    }
  }

  #funcion que sirve para obtener el id, correo o cualquier
  #campo de una tabla dado un parametro get_id get_correo
  #se esta usando en modclass.login.php ->insertarLogin()
  public function get_campo($tabla, $vercolumna1, $condcolumna1, $valor1)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT $vercolumna1 FROM $tabla WHERE $condcolumna1='$valor1'";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetch();
    //echo "holaa---$vercolumna1";
    return $resultados[$vercolumna1];
  }

  #funcion que sirve para obtener el id de un correo
  public function get_idCorreo($arg_valor1)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT idlogin FROM login WHERE correo='$arg_valor1'";
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetch();
    return $resultados['idlogin'];
  }

  #funcion que sirve para obtener todos los datos de una tabla
  #Es la misma funcion de cargarProducto

  #funcion que sirve para obtener los datos del usuario segun un parametro como el id
  #Es la misma funcion de cargarProducto

  #eliminar un campo de una tabla
  public function eliminarCampo($arg_tabla, $arg_campo, $arg_valor)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "DELETE FROM $arg_tabla WHERE $arg_campo=" . $arg_valor;
    $statement = $conexion->prepare($sql);

    $statement->execute();
    if (!$statement) {
      echo "Error al intentar eliminar el registro";
    } else {
      echo "Registro eliminado correctamente";
    }

  }

}
