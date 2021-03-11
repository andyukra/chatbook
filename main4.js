var miApp = angular.module('chatbook', []);

function scrollear() {
    window.scrollTo(0, 2000);
}

miApp.controller('registro', ($scope, $http) => {

    $scope.invalido = true;
    $scope.estado1 = 0;
    $scope.estado2 = 0;
    $scope.estado3 = 0;
    $scope.length = 0;
    $scope.emailCorrecto = true;


    $scope.p1 = () => {

        if($scope.pass1) {
            $scope.length = $scope.pass1.length;
            if($scope.length < 8) {
                $scope.passCorta = true;
                $scope.num = 0;
            } else {
                $scope.passCorta = false;
                $scope.estado1 += 1;
                if($scope.estado1 == 1 && $scope.estado2 == 1 && $scope.estado3 == 1) {
                    $scope.invalido = false;
                }
            }
        }

    }

    $scope.p2 = () => {

        if($scope.pass2) {
            if($scope.pass2 != $scope.pass1) {
                $scope.passNoCoincide = true;
                $scope.num = 0;
            } else {
                $scope.passNoCoincide = false;
                $scope.estado2 += 1;
                if($scope.estado1 == 1 && $scope.estado2 == 1 && $scope.estado3 == 1) {
                    $scope.invalido = false;
                }
            }
        }

    }

    $scope.e = () => {

        if($scope.email) {

                $http.get(`https://apilayer.net/api/check?access_key=643bac8d3b54110ec343444cf5a9295b&email=${$scope.email}&smtp=1&format=1`)

                .then(response => {
                    console.log(response);
                    if(!response.data.smtp_check) {
                        $scope.emailNoExiste = true;
                        $scope.num = 0;
                        $emailCorrecto = true;
                    } else {
                        $scope.emailNoExiste = false;
                        $scope.estado3 += 1;
                        $scope.emailCorrecto = false;
                        if($scope.estado1 == 1 && $scope.estado2 == 1 && $scope.estado3 == 1) {
                            $scope.invalido = false;
                        }
                    }
                })

                .catch(err => {console.log(err)});
        } else {
                $scope.emailNoExiste = false;
                }
    }

});

miApp.controller('login', ($scope, $http) => {

    $scope.enviar = () => {

        $http.post('login.php', { user : $scope.user, pass : $scope.pass })
        
        .then(response => {    

            if(response.data == 1) {
                alert('El Usuario o la contraseña es incorrecto/a');
                $scope.user = '';
                $scope.pass = '';
            } 
            if(response.data == 2) {  
                location.href = 'personal.php';
            }

        })

        .catch(err => console.log(err));

    }

});