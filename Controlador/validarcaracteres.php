<?php
$cadena =$_POST['descripcion'];

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
        'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'y', 'N', 'n', '', '_', '', '', '', '', "");
    $nombreLimpia = str_replace($a_tofind, $a_replac, $cadena);
    return $nombreLimpia; //    me retorna la cadena sin caracteres especiales
