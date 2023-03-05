<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Pública</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="menu">
  <h1>Textil Export</h1>
  <div class="menu-buttons">
    <button onclick="window.location.href='interfaz-publica.php'">Inicio</button>
    <button onclick="window.location.href='admin.php'">Administrador</button>
  </div>
</div>
<div class="container">
  <div class="d-flex justify-content-between">
    <div class="float-left mx-3 lol">Productos disponibles</div>
    <div class="float-right mx-3">
      <form method="post" action="" class="d-flex align-items-center">
        <div class="input-group">
          <input type="text" name="filtro" class="form-control me-2" placeholder="Buscar por palabra clave" aria-label="Buscar por palabra clave">
          <button type="submit" class="btn btn-secondary">Buscar</button>
          <button type="submit" class="btn  btn-outline-secondary ms-2">Quitar filtrado</button>

        </div>
      </form>
    </div>
  </div>
</div>

  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles del producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><strong>Código:</strong> <span id="detalles-codigo"></span></p>
    <p><strong>Nombre:</strong> <span id="detalles-nombre"></span></p>
    <img id="detalles-imagen" class="img-fluid" src="" alt="">

    <p><strong>Descripción:</strong> <span id="detalles-descripcion"></span></p>
    <p><strong>Categoría:</strong> <span id="detalles-categoria"></span></p>
    <p><strong>Precio:</strong> $<span id="detalles-precio"></span></p>
    <p><strong>Existencias:</strong> <span id="detalles-existencias"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <div class="productos">
    <?php
    
    require_once 'funciones/funciones.php';
    $obj1 = new Pog(); 
    $obj1->mostrarCartas(); 
    ?>
    </div>
    <script src="js/eljs.js"></script>
    <section class="footer">
    <?php
        require_once('funciones/footer.php')
    ?>
    </section>

</body>
</html>



