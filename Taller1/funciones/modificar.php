
<?php


$xml = new DOMDocument();
$xml->load('../xml/productos.xml');
$nodoslista=$xml->getElementsByTagName('producto');
$modificar=null;

for ($i=0; $i < $nodoslista->length; $i++) { 
    $lista=$nodoslista->item($i)->childNodes;
    for ($j=0; $j <$lista->length; $j++) { 
        if (((string) $lista->item($j)->nodeName)=='codigo') {
            $codigo=$lista->item(0);
            echo '<input type="text" value="'.$codigo.'"/>';

            $lista->item(0)->nodeValue="otro";
            $lista->item(1)->nodeValue="otro";
            $lista->item(2)->nodeValue="otro";
            $lista->item(3)->nodeValue="otro";
            $lista->item(4)->nodeValue="otro";
            $lista->item(5)->nodeValue="otro";
            $modificar=1; 
            break 2;            
        }
    }

}
if ($modificar!==null) {

    $xml->save('../xml/productos.xml');
    echo "Modificación realizada";
}else{
    echo "No ha sido modificado";
}












?>