<?php

    /*function connect() {

        $user = "bstdgzps_andyukra";
        $pass = "Terminator87*";
        $server = "localhost";
        $db = "bstdgzps_chatbook";

        $con = mysqli_connect($server, $user, $pass, $db);

        return $con;

    }*/

    function connect() {

        $user = "root";
        $pass = "";
        $server = "localhost";
        $db = "bstdgzps_chatbook";

        $con = mysqli_connect($server, $user, $pass, $db);

        return $con;

    }



?>