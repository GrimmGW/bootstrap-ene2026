<?php

// session_start();
if(!empty($_SESSION["id"])){
    header("location: index.php");
}

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
    <title>Inicio de Sesión</title>
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="d-flex text-white vh-100 justify-content-center align-items-center">
            <div class="border rounded border-secondary col-4 p-4">
                <div class="text-center mb-5">
                    <h2><b>Inicio de sesión</b></h2>
                    <p>- Programación IV -</p>
                    <?php
                        include "model/conn.php";
                        include "controller/login_controller.php";
                    ?>
                </div>
                <div>
                    <form method="POST">
                        <label for="labelUsername" class="form-label">Ingresa tu Usuario</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <label for="labelPassword" class="form-label">Ingresa tu Contraseña</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <a href="#">No recuerdo mi contraseña</a>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5" value="iniciando_sesion" name="btn_iniciarsesion">Iniciar Sesion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>