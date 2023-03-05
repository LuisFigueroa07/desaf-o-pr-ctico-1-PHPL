<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregando nuevos Productos:</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/style.css">
</head>
<body class="bg-success">
<?php
    require 'procesar.php';

                  if(count($errores)>0&&isset($_POST['enviar'])){
                    echo "<div class='alert alert-danger'><ul>";
                    foreach($errores as $error){
                      echo "<li>$error</li>";
                    }
                    echo "</ul></div>";

}
?>  

    <form id="nuevoProduc" name="nuevoProduc" method="POST" action="nuevoProducto.php" >
        <p>
            <center>
        <div class="form-group col-md-4">
            <h2><label class="" for="codigo" >Código del producto:</label></h2>
            <input type="text" name="codigo" id="codigo" class="form-control"  placeholder="PROD#####" />
            </div>

            <div class="form-group col-md-4">
            <h2><label for="nombreProduc">Nombre del producto:</label>
            <input type="text" name="nombreProduc" id="nombreProduc" class="form-control" />
            </div>

            <div class="form-group col-md-4">
            <h2><label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" />
            </div>

            <div class="form-group col-md-4">
            <h2><label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control" placeholder=".img o .png"/>
            </div>

            <div class="form-group col-md-4">
            <h2><label for="categoria">Categoría:</label>
            <select class="form-control"  name="categoria" id="categoria" >
                <option value="textil">Textil</option>
                <option value="promocional">Promocional</option>
            </select>
            </div>

            <div class="form-group col-md-4">
            <h2><label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control"  placeholder="$"/>
            </div>

            <div class="form-group col-md-4">
            <h2><label for="existencias">Existencias:</label>
            <input type="number" name="existencias" id="existencias" class="form-control" />
            </div>
            <p>
            <div class="form-group col-md-4">
            <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" />
            <button onclick="window.location.href='../admin.php'" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </center>
    </form>

    <?php
    if(isset($_POST['enviar']) && count($errores)==0){
        
        $xml = simplexml_load_file('../xml/productos.xml');
        //Recibimos los datos
        
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombreProduc'];
        $descripcion= $_POST['descripcion'];
        $img = $_POST['imagen'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $existencias = $_POST['existencias'];

        //Creando el objeto y se vincula con el archivo al que vayamos a escribir
        $doc = new DOMDocument("1.0");

        //Permite la escritura del xml
        $doc->formatOutput = true;
        $doc->load('../xml/productos.xml');

        //Asigignaciones
        $raiz = $doc->getElementsByTagName("productos")->item(0);

        $rama = $doc->createElement("producto");
        
        $hoja = $doc->createElement("codigo");
        $hoja->appendChild($doc->createTextNode($codigo));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("nombre");
        $hoja->appendChild($doc->createTextNode($nombre));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("descripcion");
        $hoja->appendChild($doc->createTextNode($descripcion));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("img");
        $hoja->appendChild($doc->createTextNode($img));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("categoria");
        $hoja->appendChild($doc->createTextNode($categoria));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("precio");
        $hoja->appendChild($doc->createTextNode($precio));
        $rama->appendChild($hoja);

        $hoja = $doc->createElement("existencias");
        $hoja->appendChild($doc->createTextNode($existencias));
        $rama->appendChild($hoja);

    $raiz->appendChild($rama);

$doc->appendChild($raiz);

$doc->save('../xml/productos.xml');        
    }
    ?>

</body>
</html>
