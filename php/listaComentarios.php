<?php
//Devuelve la lista de comentarios de la foto seleccionada
include("database.php");
if($connection){
    $query="SELECT comentario FROM comentarios";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Error en la conexion a la Base de datos " . mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "name" => $row["comentario"]
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
    die("Error en la conexion a la Base de datos " . mysqli_error($connection));
}
?>