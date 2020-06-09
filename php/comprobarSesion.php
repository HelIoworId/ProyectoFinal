<?php
//Comprobar la sesion logueada
    require_once("../php/mostrarFotos.php");
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location:../index.php");
    }
?>