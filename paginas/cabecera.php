<!DOCTYPE html> 
<html> 
  <head> 
    <title>Francisco Fotografia</title> 
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../imagenes/logo/logo.jpg">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head> 

<?php
    if(isset($_GET["error"])){
        echo "<div class='errorSubirFoto'><span>Solo se permiten cargar imagenes.</span></div>";
    }
    if(isset($_GET["errorImgName"])){
        echo "<div class='errorSubirFoto'><span>El nombre de esa foto ya existe en la Base de Datos.</span></div>";
    }
?>
<div class="error">
    </div>
    <div class="correcto">
</div>
<body class="body_paginas">
    <header>
        <div class="jumbotron jumbotron-fluid cabecera mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <a href="./principal.php"><img src="../imagenes/logo/logo1.jpg" alt="logo" class="w-100"></a>
                    </div>
                </div>   
            </div> 
        </div>
    </header>
    <div class="topnav" id="myTopnav">
        <div class="container_menus">
        <a href="./principal.php" class="active">Inicio</a>
        <a href="./comunion.php">Comuniones</a>
        <a href="./premama.php">Premama</a>
        <a href="./moda.php">Moda</a>
        <a href="./infantil.php">Infantil</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        </div>
        <div class="contenedorBotones">
            <button id="perfil" type="button" class="btn nombrePerfil" data-toggle="modal" data-target="#exampleModal" value="<?php echo $_SESSION["usuario"] ?>">
                <?php echo $_SESSION["usuario"] ?></button>
            
        </div>
        <div class="contenedorBotones botonConfig"></div>
    </div>