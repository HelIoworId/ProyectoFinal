<?php
//Comprueba que el usuario existe en la base de datos
    try{
        require_once "../php/database.php";

        $email = $_POST["emailInicio"];
        $pass = $_POST["passwordInicio"];

        $sql="SELECT usuario, email, password FROM users WHERE email= '$email'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();
        if(password_verify($pass, $userData["password"])){

            session_start();
            $_SESSION["usuario"]=$userData["usuario"];
            echo json_encode($userData["email"]);
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>