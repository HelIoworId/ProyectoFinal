<?php
//Añade un me gusta a la foto seleccionada
require_once "../php/database.php";

session_start();

if(isset($_POST['fotoMegusta'])) {
  $foto = $_POST["fotoMegusta"];
  $usuario = $_SESSION["usuario"];

  $sql="SELECT count(foto) as cantidad FROM megusta WHERE foto = '$foto' AND usuario= '$usuario'";
  $result = mysqli_query($connection, $sql);
  $valor=mysqli_fetch_assoc($result);
  $numero_registro=$valor["cantidad"];

  if($numero_registro == 0){
    $sql="INSERT INTO megusta (foto, usuario) values ('$foto', '$usuario')";
    $result = mysqli_query($connection, $sql);
    
  }
  if(isset($_POST['fotoMegusta'])){
    $sql="SELECT count(*) as cantidadLike FROM megusta WHERE foto= '$foto'";
    $result = mysqli_query($connection, $sql);

    $userData = $result->fetch_assoc();
    
    echo json_encode(intval($userData["cantidadLike"]), true);
  }
}
?>