<?php

    include("database.php");
    $con = connect();

    if(isset($_POST)) {

        $objeto = json_decode(file_get_contents("php://input"));

        $user = $objeto -> user;
        $pass = $objeto -> pass;

        $consulta = "SELECT user FROM usuarios WHERE user = '$user' AND pass = '$pass'";

        $result = mysqli_query($con, $consulta) or die(mysqli_error());
       
        if(mysqli_num_rows($result) == 0) {
            echo 1;
        } else {

            session_start();

            $_SESSION["user"] = $user;

            echo 2;

        }

        
        

    }

?>

