<?php

    include("database.php");
    $con = connect();

    $data = array();

    if(isset($_GET)) {

        $consulta = "SELECT id, user, stateTxt, tiempo FROM estados ORDER BY id DESC";

        $result = mysqli_query($con, $consulta) or die(mysqli_error());

        while($fila = mysqli_fetch_array($result)) {

            $array = array("user"=>$fila["user"], "stateTxt"=>$fila["stateTxt"], "time"=>$fila["tiempo"], "id"=>$fila["id"]);

            array_push($data, $array);

        }

        $send = json_encode($data);

        echo $send;

       
    }

?>