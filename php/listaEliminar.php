<?php
//Devuelve una lista con el nombre de las imagenes.
include("database.php");
if($connection){
    $query="SELECT nombre FROM imagenes";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Error en la conexion a la Base de datos " . mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            "name" => utf8_encode($row["nombre"])  
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
    die("Error en la conexion a la Base de datos " . mysqli_error($connection));
}
?>