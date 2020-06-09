<?php
//Muestra todas la fotos cargadas en la base de datos, cada una en su distinta pagina: comunion, premama etc
require_once "../php/database.php";
$fotosPagina="";
$fotosComunion="";
$fotosPremama="";
$fotosModa="";
$fotosInfantil="";
$tipo = array("comunion", "premama", "moda", "infantil");
$tipoPagina = "";
for ($i = 0; $i < count($tipo); $i++) {
    $tipoPagina = $tipo[$i];
    $sql = "SELECT nombre,imagen FROM imagenes WHERE tipo='$tipo[$i]'";
    $resultado=mysqli_query($connection,$sql);
    while($ver=mysqli_fetch_row($resultado)){
        $fotosPagina = $fotosPagina."<article class='caja_".$ver[0]."' taskCod=".$ver[0]."><img src='".$ver[1]."' alt='".$ver[0]."' class='imagen ".$ver[0]."'>
        <button type='button' class='btn btn-lg btn-gray btLupa' value='".$ver[1]."' data-toggle='modal' data-target='#exampleModalFotos'></button>
        <button type='button' class='btn btn-lg btn-gray btCorazon' value='".$ver[0]."'></button>
        <div class='cantidadMegusta'>0</div>
        <button type='button' value='".$ver[0]."' class='btn btn-lg btn-gray btComentario' data-toggle='modal' data-target='#exampleModal1'></button>
        <div class='cantidadComentario'>0</div>
        </article>";
    }if($tipoPagina == "comunion"){
        $fotosComunion = $fotosPagina;
    }else if($tipoPagina == "premama"){
        $fotosPremama = $fotosPagina;
    }else if($tipoPagina == "moda"){
        $fotosModa = $fotosPagina;
    }else if($tipoPagina == "infantil"){
        $fotosInfantil = $fotosPagina;
    }
    $fotosPagina = "";
}