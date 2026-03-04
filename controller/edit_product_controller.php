<?php

    if(!empty($_POST["btn_actualizar"])){
        if(!empty($_POST["nombre_producto"]) and !empty($_POST["marca_producto"]) and !empty($_POST["cantidad_producto"])){

            $id = $_POST["id"];
            $nombre_producto = $_POST["nombre_producto"];
            $marca_producto = $_POST["marca_producto"];
            $cantidad_producto = $_POST["cantidad_producto"];

            $sql = $conn->query(" update productos set nombre_producto = '$nombre_producto', marca_producto = '$marca_producto', cantidad_producto = $cantidad_producto where id = $id ");
            if($sql == true){
                header("location: index.php#productos");
            } else {
                echo "<div class='alert alert-danger'>Error al actualizar el producto.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Hay casillas vacias.</div>";
        }
    }

?>