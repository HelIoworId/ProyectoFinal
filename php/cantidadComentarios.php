<?php
//Devuelve la cantidad de comentarios que tiene la foto
require_once "../php/database.php";

if(isset($_POST['comentarioCantidad'])) {
  $foto = $_POST["comentarioCantidad"];

  $sql="SELECT count(*) as cantidad FROM comentarios WHERE foto= '$foto'";
  $result = mysqli_query($connection, $sql);

  $userData = $result->fetch_assoc();
  
  echo json_encode(intval($userData["cantidad"]), true);
}
?>