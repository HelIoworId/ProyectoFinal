<?php
//Cambia el email de la cuenta
    try{
        require_once "../php/database.php";

        $email = $_POST["emailCambiar"];
        $email2 = $_POST["emailCambiar2"];
        $pass = $_POST["passwordCambiar"];

        $sql="SELECT email, password FROM users WHERE email= '$email'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();

        if(password_verify($pass, $userData["password"])){
            $sql1="UPDATE users Set email='$email2' Where email='$email'";    

            $result1 = mysqli_query($connection, $sql1);

            echo json_encode($userData["email"], true);
        }else{
            $nulo = null;
            echo json_encode($nulo, true);
        }

    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>