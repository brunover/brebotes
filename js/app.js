/* App Module */

angular.module('Authentication', []);

var brebotesApp = angular.module('brebotesApp', ['Authentication','ngRoute','ngCookies']);

brebotesApp.config(['$routeProvider', function ($routeProvider) {

    $routeProvider.
      when('/', {
        templateUrl: 'views/home.html',
        controller: mainCtrl
      })
      .when('/admin', {
        templateUrl: 'views/admin.html',
        controller: adminCtrl
      })
      .when('/login', {
        controller: 'LoginController',
        templateUrl: 'views/login.html',
        // hideMenus: true
      })
      // home
      .otherwise({
        redirectTo: '/'
      });
}])
 
.run(['$rootScope', '$location', '$cookieStore', '$http',
    function ($rootScope, $location, $cookieStore, $http) {
        // keep user logged in after page refresh
        $rootScope.globals = $cookieStore.get('globals') || {};
        if ($rootScope.globals.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; // jshint ignore:line
        }
 
        $rootScope.$on('$locationChangeStart', function (event, next, current) {
          // redirect to login page if not logged in
          if ($location.path() == '/admin' && !$rootScope.globals.currentUser) {
            $location.path('/login');
          }
        });
    }]);

//     // Use x-www-form-urlencoded Content-Type
//     $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

//     // Override $http service's default transformRequest
//     $httpProvider.defaults.transformRequest = [function(data)
//     {
//     /**
//      * The workhorse; converts an object to x-www-form-urlencoded serialization.
//      * @param {Object} obj
//      * @return {String}
//      */ 
//     var param = function(obj)
//     {
//       var query = '';
//       var name, value, fullSubName, subName, subValue, innerObj, i;
      
//       for(name in obj)
//       {
//         value = obj[name];
        
//         if(value instanceof Array)
//         {
//           for(i=0; i<value.length; ++i)
//           {
//             subValue = value[i];
//             fullSubName = name + '[' + i + ']';
//             innerObj = {};
//             innerObj[fullSubName] = subValue;
//             query += param(innerObj) + '&';
//           }
//         }
//         else if(value instanceof Object)
//         {
//           for(subName in value)
//           {
//             subValue = value[subName];
//             fullSubName = name + '[' + subName + ']';
//             innerObj = {};
//             innerObj[fullSubName] = subValue;
//             query += param(innerObj) + '&';
//           }
//         }
//         else if(value !== undefined && value !== null)
//         {
//           query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
//         }
//       }
      
//       return query.length ? query.substr(0, query.length - 1) : query;
//     };

//     return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
//     }];

//     delete $httpProvider.defaults.headers.common['X-Requested-With'];

// });
