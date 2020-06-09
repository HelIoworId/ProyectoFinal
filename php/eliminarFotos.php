<?php
//Elimina la foto seleccionada todos los megusta y los comentarios de la misma
    try{
        require_once "../php/database.php";

        $nombre = $_POST["categoriaEliminarFoto"];

        $sql="SELECT nombre FROM imagenes WHERE nombre= '$nombre'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();

        if($userData["nombre"] == $nombre){
            $sql="DELETE FROM imagenes WHERE nombre= '$nombre'";
            $result = mysqli_query($connection, $sql);
            $sql="DELETE FROM megusta WHERE foto= '$nombre'";
            $result = mysqli_query($connection, $sql);
            $sql="DELETE FROM comentarios WHERE foto= '$nombre'";
            $result = mysqli_query($connection, $sql);
        }

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>