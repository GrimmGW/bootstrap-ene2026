<?php

session_start();
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
    <title>Página de Bootstrap</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Prog. IV 🧑🏼‍💻</a>
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
<body>
    <section id="intro">
        <div class="container-fluid d-flex text-light align-items-center justify-content-center text-center" 
        style="background-image: url('assets/landscape_darken.jpg'); height: 100vh; background-size: cover; background-position: center;">
            <div>
                <h1 class="titulo">Bienvenido, <?= $_SESSION["usuario"] ?>👋</h1>
                <p class="mt-4">Ut cupidatat ad aliquip officia ex eu aliquip do proident.</p>
                <a href="login.php" class="btn btn-light me-3 px-5" >Iniciar Sesión</a>
                <a href="controller/logout_controller.php" class="btn btn-danger" type="button">Cerrar sesion</a>
            </div>
        </div>
    </section>
    <section id="about" class="my-5">
        <div class="row align-items-center">
            <div class="col-lg-4 offset-lg-2 offset-1 col-10">
                <h2><?php echo "Vamos a hablar acerca de..."?></h2>
                <p>Labore est aute cillum veniam voluptate sint. Duis aliqua eiusmod nulla sunt in voluptate ipsum velit laboris veniam labore. Anim laboris consequat minim proident esse culpa Lorem consequat in nulla cupidatat mollit. Nulla proident ullamco labore amet duis voluptate sint aliquip nostrud nostrud quis. Sint reprehenderit consequat do dolor. Excepteur reprehenderit esse laborum est mollit deserunt non. Ipsum enim reprehenderit magna dolor aliquip pariatur dolor officia proident Lorem magna.</p>
            </div>
            <div class="col-lg-3 offset-lg-1 offset-1 col-10">
                <img class="img-fluid rounded" src="https://images.pexels.com/photos/417074/pexels-photo-417074.jpeg?cs=srgb&dl=pexels-souvenirpixels-417074.jpg&fm=jpg" alt="Una hermosa vista">
            </div>
        </div>
    </section>
    <section id="productos" class="bg-dark mt-5 p-5">
        <div class="container-fluid row text-light">
            <form method="POST" class="col-lg-4">
                <h3>Registro de productos</h3>
                <?php
                    include "model/conn.php";
                    include "controller/create_product_controller.php";
                    include "controller/delete_product_controller.php";
                ?>
                <div class="mt-4">
                    <label for="form_nombre_producto" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="nombre_producto" required>
                </div>
                <div class="mt-4">
                    <label for="form_marca_producto" class="form-label">Marca del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="marca_producto" required>
                </div>
                <div class="mt-4">
                    <label for="form_cantidad_producto" class="form-label">Cantidad del producto</label>
                    <input type="text" class="form-control bg-dark text-light" name="cantidad_producto" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="btn_registrar" value="Formulario enviado">Registrar producto</button>
            </form>
            <?php
                $query = $conn->query("select * from productos");
            ?>
            <div class="col-lg-8 table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th><b>ID</b></th>
                            <th><b>Producto</b></th>
                            <th><b>Marca</b></th>
                            <th><b>Cantidad</b></th>
                            <?php 
                                if($_SESSION["admin"] == 1){
                                    echo "<th colspan='2'><b>Acciones</b></th>";
                                }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            while($datos = $query->fetch_object()){ ?>
                        <tr>
                            <td><b><?= $datos->id ?></b></td>
                            <td><?= $datos->nombre_producto ?></td>
                            <td><?= $datos->marca_producto ?></td>
                            <td><?= $datos->cantidad_producto ?></td>
                            <?php
                                if($_SESSION["admin"] == 1){
                                    echo "<td><a href='edit_index.php?id=$datos->id' class='btn btn-warning'><i class='fa-solid fa-pen'></i></a></td>";
                                    echo "<td><a onclick='return confirm(\" Deseas borrar este producto? \")' href='index.php?id=$datos->id' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                                }
                            ?>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
<footer class="bg-dark py-4 text-light" id="contacto">
    <div class="container-fluid">
        <div class="row">
            <!-- titulo -->
             <div class="col-lg-4 offset-lg-1">
                <h3><b>PROG. IV</b></h3>
                <p>Et ut officia eu laboris ipsum adipisicing excepteur elit amet laboris.</p>
                <div class="d-flex gap-2">
                    <a class="text-decoration-none text-light" href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a class="text-decoration-none text-light" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a class="text-decoration-none text-light" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
             </div>
            <!-- Navegacion -->
             <div class="col-lg-2">
                <h6>Navegación</h6>
                <ul>
                    <li><a href="#" class="text-secondary text-decoration-none">Inicio</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Acerca de la pagina</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Productos</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Contacto</a></li>
                </ul>
             </div>
            <!-- Contacto -->
             <div class="col-lg-2">
                <h6>Contacto</h6>
                <ul class="text-secondary">
                    <li>Email: progiv@email.com</li>
                    <li>Telefono: +58 412 123-4567</li>
                    <li>Nueva Esparta, Venezuela</li>
                </ul>
             </div>
            <!-- Redes -->
            <div class="col-lg-2">
                <h6>Contacto</h6>
                <ul class="text-secondary">
                    <li>Email: progiv@email.com</li>
                    <li>Telefono: +58 412 123-4567</li>
                    <li>Nueva Esparta, Venezuela</li>
                </ul>
             </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
    crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a5601269a3.js" crossorigin="anonymous"></script>

</html>