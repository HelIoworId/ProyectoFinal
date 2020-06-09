<?php
//Compruba la contraseña y email y actualiza la contraseña si es correcta
    try{
        require_once "../php/database.php";

        $email = $_POST["emailRecuperar"];
        $pass = $_POST["passwordRecuperar"];
        $pass2 = $_POST["passwordRecuperar2"];

        $sql="SELECT email, password FROM users WHERE email= '$email'";

        $result = mysqli_query($connection, $sql);

        $userData = $result->fetch_assoc();

        if(password_verify($pass, $userData["password"])){

            $pass3 = password_hash($pass2, PASSWORD_BCRYPT, ['cost' => 10]);

            $sql1="UPDATE users Set password='$pass3' Where email='$email'";    

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