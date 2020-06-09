<?php
    try{
        require_once "../php/database.php";


        $nombrefoto=$_REQUEST["nameFoto"];
        $imagenNombreFoto=$_FILES["elegirFoto"]["name"]; //Obtiene el nombre de la imagen
        $imagenArchivoFoto=$_FILES["elegirFoto"]["tmp_name"]; //Obtiene el archivo imagen
        $categoriaFoto=$_REQUEST["categoriaFoto"];
        $ruta="../imagenes"."/".$categoriaFoto."/".$imagenNombreFoto;

        $image_file_type = pathinfo($ruta.basename($imagenNombreFoto),PATHINFO_EXTENSION);
        if($image_file_type != "jpg" && $image_file_type != "jpeg" && $image_file_type != "png") {
            header('Location: ../paginas/'.$categoriaFoto.'.php?error');
        }else{
            move_uploaded_file($imagenArchivoFoto,$ruta);
        
            $sql="SELECT nombre FROM imagenes WHERE nombre = '$nombrefoto'";
    
            $result = mysqli_query($connection, $sql);
    
            $userData = $result->fetch_assoc();
    
            if($userData["nombre"] != $nombrefoto){
                $sql="INSERT INTO imagenes (nombre, imagen, tipo) values ('$nombrefoto', '$ruta', '$categoriaFoto')";
                $result = mysqli_query($connection, $sql);
                header('Location: ../paginas/'.$categoriaFoto.'.php');
            }else{
                header('Location: ../paginas/'.$categoriaFoto.'.php?errorImgName');
            }
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>
