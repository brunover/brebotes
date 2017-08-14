

/* Controllers */
function mainCtrl($scope, $route, $http, $location, $routeParams){ 

  $('body').removeClass('body-admin');

  var currentDate = new Date();
  var day = currentDate.getDate();
  var month = currentDate.getMonth() + 1;
  var year = currentDate.getFullYear();
  var hours = currentDate.getHours();
  var minutes = currentDate.getMinutes();
  // var actualDate = new Date();
  var actualDate = Date.UTC(year,month,day,hours,minutes)/10000;

  // get data list events
  $http({
    method: 'POST', 
    url: 'conteudo/programacao.json' 
  }).
  success(function(data, status, headers, config) {

    // $scope.events = data;
    $scope.events = [];

    // for(var i = 0, l = data.length; i < l; i++) {
    // `i` will take on the values `0`, `1`, `2`,..., i.e. in each iteration
    // we can access the next element in the array with `data.items[i]`, example:
    // 
    // var obj = data.items[i];
    // 
    // Since each element is an object (in our example),
    // we can now access the objects properties with `obj.id` and `obj.name`. 
    // We could also use `data.items[i].id`.
        // console.log(data);
    // }

    angular.forEach(data, function(value, key){
        for (var i = 0; i < value.LOCATION_OBJ.length; i++) {
            var hours = value.LOCATION_OBJ[i].HORA.split(":");
            value.LOCATION_OBJ[i].HORA = hours[0];
        }

        // console.log(value['LOCATION_OBJ']);
        // console.log(data[key]['LOCATION_OBJ'][key]['HORA']);
        // var hours = value.HORA.split(":");
        // value.HORA = hours[0];

        $scope.events.push(value);
    });

    $scope.showWeek = function(day_week) {
        var splitDate = day_week.split("/");
        var day_week = new Date(splitDate[2]+'/'+splitDate[1]+'/'+splitDate[0]);

        var weekday = new Array(7);
        weekday[0]=  "Domingo";
        weekday[1] = "Segunda-feira";
        weekday[2] = "Terça-feira";
        weekday[3] = "Quarta-feira";
        weekday[4] = "Quinta-feira";
        weekday[5] = "Sexta-feira";
        weekday[6] = "Sábado";

        return weekday[day_week.getDay()];
        
    }

    // create the slider
    setTimeout(function() {
        $('#slider').carouFredSel({
            circular: false,
            infinite: false,
            auto: false,
            items: 1,
            responsive: true,
            prev: '#prevEvent',
            next: '#nextEvent',
            swipe: {
                onTouch: true
            }
        });
    }, 50);

    // console.log(data);

  }).
  error(function(data, status, headers, config) {
    console.log(data);

  });
}

function adminCtrl ($scope, $route, $http, $location, $routeParams){ 

    $('body').addClass('body-admin');

    // Form
    if($('#admin_form').length) {
        // Get the form.
        var form = $('#admin_form');

        // Get the messages div.
        var formMessages = $('.msg-form');

        $(form).submit(function(event) {
            event.preventDefault(); 


            // Serialize the form data.
            var formData = $(form).serialize();

            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            
            }).done(function(response) {
                
                if (response.trim() == "ok") {
                    $(formMessages).removeClass('error');
                    $(formMessages).addClass('success');

                    // Set the message text.
                    $(formMessages).text('Cadastro inserido com sucesso!');

                    // Clear the form.
                    $('#admin_form input').val('');

                } else {
                    $(formMessages).text('Erro ao inserir no banco. ' + response.trim());
                }

            }).fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');

                // Set the message text.
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Erro ao inserir no banco. ' + response.trim());
                }
            });
        });
    }
}


brebotesApp.controller('LoginController',
    ['$scope', '$rootScope', '$location', 'AuthenticationService',
    function ($scope, $rootScope, $location, AuthenticationService) {

        $('body').removeClass('body-admin');

        // reset login status
        AuthenticationService.ClearCredentials();
 
        $scope.login = function () {
            $scope.dataLoading = true;
            AuthenticationService.Login($scope.username, $scope.password, function(response) {
                if(response.success) {
                    AuthenticationService.SetCredentials($scope.username, $scope.password);
                    $location.path('/admin');
                } else {
                    $scope.error = response.message;
                    $scope.dataLoading = false;
                }
            });
        };
    }]);






