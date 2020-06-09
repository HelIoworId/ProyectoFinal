<?php
//Elimina el usuario y todos sus me gusta y comentarios
    try{
        require_once "../php/database.php";

        $nombre = $_POST["categoriaEliminarUsuario"];

        $sql="SELECT usuario FROM users WHERE usuario= '$nombre'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();

        if($userData["usuario"] == $nombre){
            $sql="DELETE FROM users WHERE usuario= '$nombre'";
            $result = mysqli_query($connection, $sql);
            $sql="DELETE FROM megusta WHERE usuario= '$nombre'";
            $result = mysqli_query($connection, $sql);
            $sql="DELETE FROM comentarios WHERE usuario= '$nombre'";
            $result = mysqli_query($connection, $sql);
        }

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>