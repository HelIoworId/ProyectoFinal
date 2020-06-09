<?php
//Devuelve una lista con todos los usuarios registrados
include("database.php");
if($connection){
    $query="SELECT usuario FROM users WHERE usuario NOT IN ('Admin')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Error en la conexion a la Base de datos " . mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "name" => $row["usuario"]
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
    die("Error en la conexion a la Base de datos " . mysqli_error($connection));
}
?>