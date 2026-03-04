<?php
session_start();
    if(!empty($_POST["btn_iniciarsesion"])){
        if(!empty($_POST["username"]) and !empty($_POST["password"])){

            $user = $_POST["username"];
            $pass = $_POST["password"];

            $sql = $conn->query(" select * from usuarios where nombre_usuario = '$user' and password_usuario = '$pass' ");
            if($datos = $sql->fetch_object()){
                $_SESSION["id"] = $datos->id;
                $_SESSION["usuario"] = $datos->nombre_usuario;
                $_SESSION["email"] = $datos->email_usuario;
                $_SESSION["admin"] = $datos->admin;
                header("location: ../index.php");
            } else {
                echo "<div class='alert alert-danger'>Este usuario no existe.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Hay casillas vacias.</div>";
        }
    }
?>