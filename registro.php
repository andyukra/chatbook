<?php

    include("database.php");

    $con = connect();

    if(isset($_POST)) {

        $user = $_POST["user"];
        $email = $_POST["email"];
        $pass = $_POST["pass1"];

        $consulta = "SELECT user FROM usuarios WHERE user = '$user'";
        $consulta2 = "SELECT email FROM usuarios WHERE email = '$email'";

        $result = mysqli_query($con, $consulta) or die(mysqli_error());
        $result2 = mysqli_query($con, $consulta2) or die(mysqli_error());

        if((mysqli_num_rows($result) != 0) || (mysqli_num_rows($result2) != 0)) {
            echo '<!DOCTYPE html>
            <html lang="en" ng-app="chatbook">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Expires" content="0">
                <meta http-equiv="Last-Modified" content="0">
                <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
                <meta http-equiv="Pragma" content="no-cache">
                <!-- Angular JS -->
                <script src="angular.min.js"></script>
                <!-- FONT AWESOME -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
                <!-- Font Google -->
                <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
                <!-- Custom Style -->
                <link rel="stylesheet" href="estilo12.css">
                <title>ChatBook</title>
            </head>
            <body>
            
                <main>
                 
                    <section class="registro" ng-controller="registro">
            
                        <form action="registro.php" method="POST"">
                            <h1>El usuario o el email ingresado ya se encuentran registrados</h1>
                            <a href="index.html" style="text-decoration:none;padding:10px;background:turquoise;text-align:center;font-size:30px;box-shadow:3px 3px 7px 2px black, inset 3px 3px 3px white; border-radius:10px;filder:blur(1px);color:white; text-shadow:0 0 10px yellow;">Regresar</a>
                        </form>
            
                    </section>
                </main>
                
                <footer>
                    <p>ChatBook® No se hace responsable por el mal uso que le den, según la ley Nº 32.456 de la Constitución Nacional la página fue hecha solo para fines recreativos. Cualquier intento de lucro, maltrato virtual y/o distorción de la realidad será penada por ley. Derechos reservados ChatBook®. </p>
                </footer>
                
                <script src="main3.js"></script>
            </body>
            </html>';

        } else {
            $consulta3 = "INSERT INTO usuarios(user, pass, email)VALUES('$user','$pass','$email')";
            mysqli_query($con, $consulta3) or die(mysqli_error());
            echo '<!DOCTYPE html>
            <html lang="en" ng-app="chatbook">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="Expires" content="0">
                <meta http-equiv="Last-Modified" content="0">
                <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
                <meta http-equiv="Pragma" content="no-cache">
                <!-- Angular JS -->
                <script src="angular.min.js"></script>
                <!-- FONT AWESOME -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
                <!-- Font Google -->
                <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
                <!-- Custom Style -->
                <link rel="stylesheet" href="estilo12.css">
                <title>ChatBook</title>
            </head>
            <body>
            
                <main>
                 
                    <section class="registro" ng-controller="registro">
            
                        <form action="registro.php" method="POST"">
                            <h1>Muchas gracias por registrarse, esperamos que disfrute su estancia.</h1>
                            <a href="index.html" style="text-decoration:none;padding:10px;background:turquoise;text-align:center;font-size:30px;box-shadow:3px 3px 7px 2px black, inset 3px 3px 3px white; border-radius:10px;filder:blur(1px);color:white; text-shadow:0 0 10px yellow;">Regresar</a>
                        </form>
            
                    </section>
                </main>
                
                <footer>
                    <p>ChatBook® No se hace responsable por el mal uso que le den, según la ley Nº 32.456 de la Constitución Nacional la página fue hecha solo para fines recreativos. Cualquier intento de lucro, maltrato virtual y/o distorción de la realidad será penada por ley. Derechos reservados ChatBook®. </p>
                </footer>
                
                <script src="main3.js"></script>
            </body>
            </html>';
        }

    }


?>