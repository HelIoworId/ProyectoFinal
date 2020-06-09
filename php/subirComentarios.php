<?php
    try{
        $base=new PDO("mysql:host=localhost; dbname=proyectofinal", "root", "");

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        session_start();
        
        $sql="INSERT INTO comentarios (usuario, foto, comentario) values (:user, :imagen, :coment)";

        $resultado=$base->prepare($sql);
        $nombre=htmlentities(addslashes($_SESSION["usuario"]));
        $coment=htmlentities(addslashes($_REQUEST["comentarioFoto"]));
        $fotonombre=htmlentities(addslashes($_REQUEST["nombreFoto"]));

        $resultado->bindValue(":user", $nombre);
        $resultado->bindValue(":imagen", $fotonombre);
        $resultado->bindValue(":coment", $coment);
        $resultado->execute();

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>