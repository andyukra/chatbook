<?php
    error_reporting(0);
    session_start();

    $sessionUser = $_SESSION["user"];

    if($sessionUser == null || $sessionUser == "") {
        echo "Usted no tiene autorización";
        die();
    }

?>

<!DOCTYPE html>
<html lang="en" ng-app="personal">
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

    <header>

        <nav>
            <img src="img/logo.png" id="brand" width="250px" alt="">
            <ul class="menu">
                <li>
                    <a href="index.html">Inicio</a>
                    <div class="bordeLi one"></div>
                </li>
                <li>
                    <a href="#">Perfil</a>
                    <div class="bordeLi two"></div>
                </li>
                <li>
                    <a href="cerrarSesion.php">Cerrar Sesión</a>
                    <div class="bordeLi three"></div>
                </li>
            </ul>
        </nav>
        <h1 class="welcom">Bienvenida/o <?php echo $sessionUser ?></h1>
    </header>

    <main>
        <section class="cuerpo" style="padding:15px;">
            <section class="upState">
                <form name="form" ng-controller="upState">
                    <h2>Cuentanos lo que piensas</h2>
                    <br>
                    <div class="cajitaState">
                        <input type="text" ng-model="stateTxt" placeholder="Deja que tu mente escriba..." required maxlength=250 autofocus>
                        <button ng-click="enviar()" ng-disabled="form.$invalid">Enviar</button>
                    </div>
                </form>
                <div class="upImages">
                    <form action="upStateImg" method="POST" enctype="multipart/form-data">
                        <input type="file" id="file">
                        <button>Subir imágen</button>
                    </form>
                </div>
            </section>
            <section class="allStates" ng-controller="extract">
                    <div class="tarjetaS" ng-repeat="x in extractData">
                        <h2>{{ x.user }}</h2>
                        <p class="xState">{{ x.stateTxt }}</p>
                        <p class="xTime">{{ x.time }}</p>
                        <div class="comentarios">

                            <div class="cajitaComentarios">                         
                                <div class="cajinCom">
                                    
                                </div>                 
                            </div>

                            <div class="verC">
                                <button idState="{{x.id}}" ng-click="extractComent($event)">Ver Comentarios</button>
                            </div>
                        
                            <ul>
                                <li ng-click="MG($event)"><span>Me gusta <i class="fas fa-thumbs-up"></i></span></li>
                                <li ng-click="abrirComent($event)"><span>Comentar <i class=" fas fa-comment"></i></span></li>
                                <li><span>Compartir <i class="fas fa-share-alt"></i></span></li>
                            </ul>
                            
                            <form class="coment" name="formCom">
                                    <textarea ng-model="comentario" required maxlength=150></textarea>
                                    <button ng-click="enviarCom($event, comentario)" idState='{{ x.id }}' ng-disabled="formCom.$invalid">enviar</button>                                  
                            </form>
                        
                        </div>
                    </div>
            </section>
        </section>
        <section class="aside">

        </section>
    </main>
   
    <footer>
        <p>ChatBook® No se hace responsable por el mal uso que le den, según la ley Nº 32.456 de la Constitución Nacional la página fue hecha solo para fines recreativos. Cualquier intento de lucro, maltrato virtual y/o distorción de la realidad será penada por ley. Derechos reservados ChatBook®. </p>
    </footer>
    
    <script src="personal.js"></script>
</body>
</html>