<?php

    include "model/conn.php";
    $id = $_GET["id"];
    $sql = $conn->query(" select * from productos where id = $id ");

?>


<!DOCTYPE html>
<html lang="es-VE">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="extras.css">
    <link rel="shortcut icon" href="assets/icons/globo-aerostatico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando producto <?= $id?></title>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Prog. IV 🧑🏼‍💻</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#about">Acerca de la página</a>
                    <a class="nav-link" href="#productos">Productos</a>
                    <a class="nav-link" href="#contacto">Contacto</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<body class="bg-dark">
    <section class="mt-5 p-5" id="editar">
        <div class="container-fluid row text-light">
            <form method="POST" class="col-lg-4 m-auto">
                <h3 class="text-center">Actualizar producto</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include "controller/edit_product_controller.php";
                    while($datos = $sql->fetch_object()){
                ?>
                <div class="mt-4">
                    <label for="form_nombre_producto" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="nombre_producto" value="<?= $datos->nombre_producto?>" required>
                </div>
                <div class="mt-4">
                    <label for="form_marca_producto" class="form-label">Marca del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="marca_producto" value="<?= $datos->marca_producto?>" required>
                </div>
                <div class="mt-4">
                    <label for="form_cantidad_producto" class="form-label">Cantidad del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="cantidad_producto" value="<?= $datos->cantidad_producto?>" required>
                </div>
                <?php }?>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4" name="btn_actualizar" value="Producto actualizado">Actualizar producto</button>
                </div>
            </form>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a5601269a3.js" crossorigin="anonymous"></script>

</html>