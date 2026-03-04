<?php

    if(!empty($_POST["btn_registrar"])){
        if(!empty($_POST["nombre_producto"]) and !empty($_POST["marca_producto"]) and !empty($_POST["cantidad_producto"])){

            $nombre_producto = $_POST["nombre_producto"];
            $marca_producto = $_POST["marca_producto"];
            $cantidad_producto = $_POST["cantidad_producto"];

            $sql = $conn->query(" insert into productos (nombre_producto, marca_producto, cantidad_producto) values('$nombre_producto', '$marca_producto', $cantidad_producto)");
            if($sql == true){
                header("location: index.php");
            } else {
                echo "<div class='alert alert-danger'>Error al crear el producto.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Hay casillas vacias.</div>";
        }
    }

?>