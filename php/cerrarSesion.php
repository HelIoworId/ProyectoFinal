<?php
//Cerrar sesion de la cuenta
    session_start();

    session_destroy();

    header("Location:../index.php")
?>