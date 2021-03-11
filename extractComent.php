<?php

    include("database.php");
    $con = connect();

    $data = array();

    if(isset($_POST)) {

        $obj = json_decode(file_get_contents("php://input"));

        $id = $obj -> id;

        $consulta = "SELECT user, coment FROM comentarios WHERE id_estado = '$id'";

        $result = mysqli_query($con, $consulta) or die(mysqli_error());

        while($file = mysqli_fetch_array($result)) {

            $array = array("user"=>$file["user"], "coment"=>$file["coment"]);

            array_push($data, $array);

        }

        $send = json_encode($data);

        echo $send;

    }

?>