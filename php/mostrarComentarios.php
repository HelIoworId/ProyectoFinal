<?php
//Muestra la lista de comentario y quien lo ha escrito en una tabla
include("database.php");
if($connection){
    $foto = $_POST["coment"];
    $query="SELECT usuario,comentario FROM comentarios WHERE foto= '$foto'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Error en la conexion a la Base de datos " . mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "name" => $row["usuario"],
            "descrip" => utf8_encode($row["comentario"])  
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
    die("Error en la conexion a la Base de datos " . mysqli_error($connection));
}
?>