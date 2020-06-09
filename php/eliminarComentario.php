<?php
//Elimina el comentario seleccionado
    try{
        require_once "../php/database.php";

        $nombre = $_POST["categoriaEliminarComentario"];

        $sql="DELETE FROM comentarios WHERE comentario= '$nombre'";

        $result = mysqli_query($connection, $sql);

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>