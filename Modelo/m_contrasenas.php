<?php

class m_contrasenas
{

  public function cambiarContrasena($correo, $contrasena)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "UPDATE login SET contrasena = :contrasena WHERE correo= :correo";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(":contrasena", $contrasena);
    $statement->bindParam(":correo", $correo);
    $statement->execute();

    $count = $statement->rowCount();

    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($count == 0) {
      return 2;
    } else {

      return 1;
    }

  }

  public function validarContrasenaVieja($campo, $correo, $contrasena)
  {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $sql       = "SELECT * FROM login WHERE correo = :correo and contrasena = :contrasena";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(":contrasena", $contrasena);
    $statement->bindParam(":correo", $correo);
    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    $statement->execute();

/* Return number of rows that were deleted */

    $count = $statement->rowCount();

    // VERIFICA SI EL RESULTADO ES DIFERENTE DE VACIO QUIERE DECIR QUE EL CORREO SI EXISTE Y ESTA ACTIVO
    if ($count == 0) {
      return 2;
    } else {

      return 1;
    }
  }

}
