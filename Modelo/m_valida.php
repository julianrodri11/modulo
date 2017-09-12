<?php

class m_valida
{
  public function caracteres($cadena)
  {
    #BUSCA ALGUNO DE ESTOS CARACTERES
    $a_tofind = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å',
      'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø',
      'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë', 'Ç', 'ç',
      'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï',
      'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü', 'ÿ', 'Ñ', 'ñ', ' ', '´', "'", ">", "<", "/", "-");
    # Y LOS DEJA SIN TILDES, SIGNOS ETC

    $a_replac = array('A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a',
      'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o',
      'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'C', 'c',
      'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i',
      'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'y', 'N', 'n', '1', '_', '', '', '', '', "");
    $nombreLimpia = str_replace($a_tofind, $a_replac, $cadena);
    return $nombreLimpia; //    me retorna la cadena sin caracteres especiales
  }
  public function espacioBlanco($cadena)
  {
    #BUSCA ALGUNO DE ESTOS CARACTERES
    $a_tofind = array('1');
    # Y LOS DEJA SIN TILDES, SIGNOS ETC

    $a_replac = array(' ');
    $nombreLimpia = str_replace($a_tofind, $a_replac, $cadena);
    return $nombreLimpia; //    me retorna la cadena sin caracteres especiales
  }

  public function remplazarcaracteresEspeciales($cadena)
  {
    $a_tofind = array('¨', 'º', '-', '~',
      '#', '|', '!', '"',
      '·', '$', '%', '&', '/',
      '(', ')', '?', '"', '¡',
      '¿', '[', '^', '<code>', ']',
      '+', '}', '{', '¨', '´',
      '>', '< ', ';', ',', ':',
      '.', ' ');

    $a_replac = array(" ", " ", " ", " ",
      " ", " ", " ", " ",
      " ", " ", " ", " ", " ",
      " ", " ", " ", " ", " ",
      " ", " ", " ", " ", " ",
      " ", " ", " ", " ", " ",
      " ", " ", " ", " ", " ",
      " ", "1");
    $nombreLimpia = str_replace($a_tofind, $a_replac, $cadena);
    return $nombreLimpia;
  }

  public function carcteresEspeciales($cadena)
  {
    if (preg_match("/^.*(?=.*\W).*$/", $cadena)) {
      return 2;
    } else {
      return 1;
    }
  }

  public function validaigualdad($numero1, $numero2)
  {
    if ($numero2 == $numero1) {
      return 1;
    } else {
      return 2;
    }
  }

  public function validarLongitudCadena($cadena)
  {
    if (preg_match("/^.*(?=.{8,}).*$/", $cadena)) {
      return 1;
    } else {
      return 2;
    }
  }

  public function validarSeguridadPassword($cadena)
  {
    if (preg_match("/^.*(?=.{8,})(?=.*\W)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $cadena)) {
      return 1;
    } else {
      return 2;
    }
  }
  public function validaNumeros($cadena)
  {
    if (is_numeric($cadena)) {
      return 1;
    } else {
      return 2;
    }
  }

  public function validaCorreo($cadena)
  {
    if (filter_var($cadena, FILTER_VALIDATE_EMAIL)) {
      return 1;
    } else {
      return 2;
    }
  }

}
