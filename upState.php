<?php

    session_start();

    include("database.php");
    $con = connect();


    if(isset($_POST)) {

        $user = $_SESSION["user"];

        $obj = json_decode(file_get_contents("php://input"));

        $stateTxt = $obj -> stateTxt;

        $consulta = "INSERT INTO estados(user, stateTxt)VALUES('$user', '$stateTxt')";

        mysqli_query($con, $consulta) or die(mysqli_error());
        
        echo "Datos ingresados";

    }

?>