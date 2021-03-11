var miApp = angular.module('personal', []);

var estado = 0;

miApp.controller('upState', ($scope, $http) => {

    $scope.enviar = () => {

        $http.post('upState.php', { stateTxt : $scope.stateTxt })

        .then(response => {
            location.reload();
        })

        .catch(err => { console.log(err)});

    }

});

miApp.controller('extract', ($scope, $http) => {

    $http.get('extractData.php')

    .then(response => {
            $scope.extractData = response.data;
    })

    .catch(err => { console.log(err) });

    /* Extraer Comentarios */

    $scope.extractComent = ($event) => {

        if(estado == 0) {

            let id = $event.target.getAttribute('idState');
        
            $http.post('extractComent.php', { id : id })
    
            .then(response => {
    
                let x = $event.target.parentNode.previousElementSibling.childNodes[1];
                
                for(let i = 0; i < response.data.length; i++) {
    
                    x.innerHTML += `<h3>${response.data[i].user}</h3>`;
                    x.innerHTML += `<p>${response.data[i].coment}</p>`;
    
                }

                estado = 1;
    
            })
    
            .catch(err => { console.log(err) });

        }

        if(estado == 1) {

            let x = $event.target.parentNode.previousElementSibling.childNodes[1];

            x.innerHTML = '';

            estado = 0;

        }

        

    }

    /*Comentario*/

    $scope.enviarCom = ($event, comentario) => {

        $scope.id_state = $event.target.getAttribute('idState');

        $scope.comentario = comentario;

        $http.post('coment.php', { coment : $scope.comentario, id_state : $scope.id_state })

        .then(response => {
            console.log(response);
        })

        .catch(err => { console.log(err) });

        $scope.comentario = '';

        $event.target.previousSibling.previousSibling.value = '';
        $event.target.parentNode.classList.toggle('toggle');

    }

    $scope.abrirComent = ($event) => {
        $event.target.parentNode.parentNode.nextElementSibling.classList.toggle('toggle');
    }

    $scope.MG = ($event) => {

        $event.target.style.color = 'yellowGreen';
        $event.target.style.textShadow = '0 0 5px black';

    }

});

