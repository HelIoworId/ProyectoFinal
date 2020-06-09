<?php
//Devuelve la cantidad de me gusta que tiene la foto
require_once "../php/database.php";

if(isset($_POST['fotoMegusta'])) {
  $foto = $_POST["fotoMegusta"];

  $sql="SELECT foto, count(usuario) as cantidadLike FROM megusta WHERE foto= '$foto'";
  $result = mysqli_query($connection, $sql);

  $userData = $result->fetch_assoc();
  
  echo json_encode(intval($userData["cantidadLike"]), true);
}
?>