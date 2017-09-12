<?php

require_once '../Modelo/Conexion.php';
require_once '../Modelo/m_contrasenas.php';
require_once '../Modelo/m_valida.php ';
require_once '../Modelo/m_perfiles.php ';
require_once '../Modelo/m_opciones.php ';
require_once '../Modelo/m_modulos.php ';

$verificarRegistropcion = 4;

$validarNumericoidOpcion=m_valida::validaNumeros($_POST['idOpcion']);
$validarNumericoidModulo=m_valida::validaNumeros($_POST['idModulo']);
$validarNumericoidPerfil=m_valida::validaNumeros($_POST['idPerfil']);

if (!isset($_POST['idOpcion']) || empty($_POST['idOpcion'])) {
  echo "Falta seleccionar la opcion";
  $verificarRegistropcion = 1;
}if (!isset($_POST['idModulo']) || empty($_POST['idModulo'])) {
  echo "Falta seleccionar la perfil";
  $verificarRegistropcion = 2;
}if (!isset($_POST['idPerfil']) || empty($_POST['idPerfil'])) {
  echo "Falta seleccionar la opcion";
  $verificarRegistropcion = 1;
} elseif ($validarNumericoidOpcion==2) {
  echo "Error,la opcion debe ser numerica y no caracter";
} elseif ($validarNumericoidOpcion==2) {
  echo "la opcion debe ser numerica y no caracter";
}elseif ($validarNumericoidModulo==2) {
  echo "Error, El id del moodulo debe ser numerica ";
}elseif ($validarNumericoidPerfil==2) {
  echo "Error, El id del Perfil debe ser numerica ";
}

elseif ($verificarRegistropcion >= 4) {
  $verificarRegistropcion = m_opciones::buscarregistropcion($_POST['idPerfil'], $_POST['idModulo'], $_POST['idOpcion']);
  if ($verificarRegistropcion == 2) {
    echo "La Opcion ya se encuntra registrada";
  } elseif ($verificarRegistropcion == 1) {
    $registroModulosOpciones = m_opciones::insertarModuloOpcion($_POST['idPerfil'], $_POST['idModulo'], $_POST['idOpcion']);
    if ($registroModulosOpciones == 1) {
      echo "Funcion registrada con exito";
    } elseif ($registroModulosOpciones == 2) {
      echo "Error al registrar la funcion";
    }

  }
}
