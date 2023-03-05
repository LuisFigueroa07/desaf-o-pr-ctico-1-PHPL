<?php
require 'validaciones.php';
$errores=array();
if(isset($_POST)){
    
   extract($_POST);
   

   if(!isset($codigo)||estaVacio($codigo)){
    array_push($errores,"Debes ingresar el Codigo");
}
else if(!codigo($codigo)){
    array_push($errores,"Codigo no valido");
   }

   if(!isset($nombreProduc)||estaVacio($nombreProduc)){
       array_push($errores,"Debes ingresar el nombre");
   }

   if(!isset($descripcion)||estaVacio($descripcion)){
    array_push($errores,"Debes ingresar la descripción");
}

    if(!isset($imagen)||estaVacio($imagen)){
        array_push($errores,"Debes ingresar una imagen");
    }else if(!esImagen($imagen)){
    array_push($errores,"El formato de la imagen debe ser: .png o .jpg");
    }
    

    if(!isset($precio)||estaVacio($precio)){
        array_push($errores,"Debes ingresar una cantidad mayor a 0");
    }else if(!esDinero($precio)){
    array_push($errores,"Deben ser solo números, además de números positivos");
    }


    
}
?>