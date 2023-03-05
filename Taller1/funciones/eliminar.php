<?php

    $xml = new DOMDocument();
    $xml->load('../xml/productos.xml');
    $nodoslista=$xml->getElementsByTagName('producto');
    $remover=null;
    
    for ($i=0; $i < $nodoslista->length; $i++) { 
        $lista=$nodoslista->item($i)->childNodes;
        for ($j=0; $j <$lista->length; $j++) { 
            if (((string) $lista->item($j)->nodeName)=='codigo') {
                $remover=$nodoslista->item($i);
                break 2;
            }
        }
    
    }
    if ($remover!==null) {
        $remover->parentNode->removeChild($remover);
        $xml->save('../xml/productos.xml');
        echo "Eliminado";
    }else{
        echo "No ha sido eliminado";
    }


    
?>