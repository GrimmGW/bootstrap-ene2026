<?php

    if(!empty($_GET["id"])){
        $id = $_GET["id"];
        $sql = $conn->query(" delete from productos where id = $id ");

        if($sql == true){
                header("location: index.php#productos");
        } else {
                echo "<div class='alert alert-danger'>Error al borrar el producto.</div>";
        }
    }

?>