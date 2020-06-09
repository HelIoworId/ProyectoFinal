<?php
//Añade un usuario si este cumple las condiciones del formulario y no existe en la base de datos.
    try{
        require_once "../php/database.php";

        $usuario = $_POST["usuarioRegistrar"];
        $email = $_POST["emailRegistrar"];
        $passEnviada = $_POST["passwordRegistrar"];
        $pass = password_hash($passEnviada, PASSWORD_BCRYPT, ['cost' => 10]);

        $sql="SELECT usuario FROM users WHERE usuario= '$usuario'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();

        $sql1="SELECT email FROM users WHERE email= '$email'";

        $result1 = mysqli_query($connection, $sql1);

        $userData1 = $result1->fetch_assoc();

        if($userData["usuario"] == $usuario){

            echo json_encode($userData["usuario"], true);

        }else if($userData1["email"] == $email){

            echo json_encode($userData1["email"], true);

        }else{
            $sql="INSERT INTO users (usuario, email, password, tipo) values ('$usuario', '$email', '$pass', 'Usuario')";

            $result = mysqli_query($connection, $sql);
        }

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>