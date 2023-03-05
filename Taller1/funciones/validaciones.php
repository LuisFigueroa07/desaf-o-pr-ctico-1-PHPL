<?php
function estaVacio($var){
 return empty(trim($var));
}

function codigo($var){
    return preg_match('/^PROD\d{5}$/',$var);
   }

function esTexto($var){
    return preg_match('/^[a-zA-Z ]+$/',$var);
}

function esImagen($var){
    return preg_match('/^.*\.(jpg|png)$/',$var);
}

function esDinero($var){
    return preg_match('/^[0-9]+$/',$var);
}

function existencias($var){
    return preg_match('/^([1-9]|0)$/',$var);
}


?>