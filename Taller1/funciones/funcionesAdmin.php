<?php



class Pog{

    public function mostrarCartas(){

        // Obtener la palabra clave ingresada por el usuario
        $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : '';

        $eliminar = isset($_POST['eliminar']) ? $_POST['filtro'] : '';
    
        // Verificar si se ha enviado la acción "quitar filtro"
        if(isset($_POST['quitar-filtro'])) {
            // Redirigir a la página actual sin filtro
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    
        // Cargar el archivo XML
        $xml = simplexml_load_file('xml/productos.xml');
    
        // Recorrer los elementos del XML y mostrarlos
        foreach($xml->children() as $producto) {
            // Verificar si se debe mostrar este producto según el filtro
            if(empty($filtro) || stripos($producto->nombre, $filtro) !== false) {
                $colorTarjeta = ($producto->existencias == 0) ? 'bg-danger' : 'bg-success';
            
                echo '<div class="card '.$colorTarjeta.'" style="width: 15rem;">';
                echo '<div class="position-relative">';
                echo '<img src="' . 'img/' . $producto->img . '" class="card-img-top" alt="' . $producto->nombre . '">';
                if($producto->existencias == 0) {
                    echo '<div class="bg-danger text-white p-2 position-absolute top-0 start-0 producto-no-disponible">Producto no disponible</div>';
                }
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $producto->nombre . '</h5>';
                echo '<p class="card-text">Precio: $' . $producto->precio . '</p>';
                echo '<div class="text-center"><button type="button" class="btn btn-primary detalles-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-codigo="'.$producto->codigo.'" data-nombre="'.$producto->nombre.'" data-descripcion="'.$producto->descripcion.'" data-categoria="'.$producto->categoria.'" data-precio="'.$producto->precio.'" data-existencias="'.$producto->existencias.'" data-imagen="' . $producto->img . '">Detalles</button></div>';
                echo '<a href="funciones/modificar.php"><div class="text-center"><button type="button" class="btn btn-dark modificar-btn" href="">Modificar</button></div></a>';
                echo '<a href="funciones/eliminar.php"><div class="text-center"><button type="button" class="btn btn-danger eliminar-btn btn-outline-dark" data-codigo="'.$producto->codigo.'">Eliminar</button></div></a>';
                echo '</div>';
                echo '</div>';
            }
        }
    
        // Obtener el botón "quitar filtrado"
        $quitarFiltroBtn = '<form method="post"><button type="submit" name="quitar-filtro" class="btn btn-outline-secondary ms-2" id="quitar-filtro-btn">Quitar filtrado</button></form>';
    
    }
    

}

?>
