<?php

    session_start();

    include("database.php");
    $con = connect();

    if(isset($_POST)) {

        $user = $_SESSION["user"];

        $obj = json_decode(file_get_contents("php://input"));

        $coment = $obj -> coment;
        $id_state = $obj -> id_state;

        $consulta = "INSERT INTO comentarios(user, coment, id_estado)VALUES('$user', '$coment', '$id_state')";

        mysqli_query($con, $consulta) or die(mysqli_error());

        echo 'Bien';

    }

?>